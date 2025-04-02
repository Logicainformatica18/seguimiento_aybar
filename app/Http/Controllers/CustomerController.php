<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;
use App\Models\Status;
use App\Models\Business_partner;
use App\Models\Editor;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CustomerNotification;
use stdClass;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $proyecto = $request->query('proyecto', '');
        $estado = $request->query('estado', '');
        $socio_comercial = $request->query('socio_comercial', '');
        $letras_verificada = $request->query('letras_verificada', '');
        $editor_query = $request->query('editor_query', '');

        $separation_start = $request->query('separation_start', '');
        $separation_end = $request->query('separation_end', '');
        $operation_start = $request->query('operation_start', '');
        $operation_end = $request->query('operation_end', '');

        $Project = Project::orderBy('id', 'DESC')->get();
        $state = Status::orderBy('id', 'DESC')->get();
        $users = User::orderBy('id', 'DESC')->get();
        $business_partner = Business_partner::orderBy('id', 'DESC')->get();
        $editor = Editor::orderBy('id', 'DESC')->get();
        $letras_verificadas = Customer::select('returned_letters')
            ->orderBy('returned_letters', 'asc')
            ->where('returned_letters', '<>', '')
            ->distinct()->get();

        $Customer = Customer::query();

        if (!empty($proyecto)) {
            $Customer->where('customers.project_id', 'like', $proyecto);
        }
        if (!empty($estado)) {
            $Customer->where('customers.statuses_id', 'like', $estado);
        }
        if (!empty($socio_comercial)) {
            $Customer->where('customers.business_partners_id', 'like', $socio_comercial);
        }
        if (!empty($letras_verificada)) {
            $Customer->where('customers.returned_letters', 'like', $letras_verificada);
        }
        if (!empty($editor_query)) {
            $Customer->where('customers.editors_id', 'like', $editor_query);
        }

        if (!empty($separation_start) && !empty($separation_end)) {
            $Customer->whereBetween(DB::raw('CAST(separation_date AS DATE)'), [$separation_start, $separation_end]);
        }
        if (!empty($operation_start) && !empty($operation_end)) {
            $Customer->whereBetween(DB::raw('CAST(operations_entry AS DATE)'), [$operation_start, $operation_end]);
        }

        $Customer = $Customer->orderBy('customers.id', 'DESC')->paginate(10)->appends($request->query());

        return view('Customer.Customer', compact('Customer', 'Project', 'state', 'business_partner', 'editor', 'letras_verificadas','users'));
    }

    public function dashboard()
    {
        $count = $this->count();
        return view('Customer.Customer_dashboard', compact('count'));
    }

    public function show(Request $request)
    {
        $Customer = Customer::with('Project')
            ->when($request->criterio, function ($query, $criterio) {
                $query
                    ->orWhere('dni_1', 'like', "%$criterio%")
                    ->orWhere('client_1', 'like', "%$criterio%")
                    ->orWhere('client_2', 'like', "%$criterio%")
                    ->orWhere('dni_2', 'like', "%$criterio%")
                    ->orWhere('client_3', 'like', "%$criterio%")
                    ->orWhere('dni_3', 'like', "%$criterio%")
                    ->orWhere('client_4', 'like', "%$criterio%")
                    ->orWhere('dni_4', 'like', "%$criterio%")
                    ->orWhere('client_5', 'like', "%$criterio%")
                    ->orWhere('dni_5', 'like', "%$criterio%") ;
            })
            ->orderBy('customers.id', 'asc')
            ->paginate(10);

        $crit = $request->criterio;

        return view('Customer.Customertable', compact('Customer', 'crit'));
    }

    public function create()
    {
        $Customer = Customer::orderBy('id', 'DESC')->get();
        return view('Customer.Customertable', compact('Customer'));
    }

    public function store(Request $request)
    {


        try {
            $customer = new Customer();

            // Comercial
            $customer->project_id = $request->project_id;
            $customer->mz_lt = $request->mz_lt;
            $customer->client_1 = $request->client_1;
            $customer->dni_1 = $request->dni_1;
            $customer->business_partners_id = $request->business_partners_id;
            $customer->separation_date = $request->separation_date;
            $customer->separation_amount = $request->separation_amount;
            $customer->assistant_id = $request->assistant_id;
            $customer->initial_paid = $request->initial_paid;
            $customer->initial_payment_date = $request->initial_payment_date;
            $customer->initial_amount = $request->initial_amount;

            // Redacción
            $customer->client_2 = $request->client_2;
            $customer->dni_2 = $request->dni_2;
            $customer->client_3 = $request->client_3;
            $customer->dni_3 = $request->dni_3;
            $customer->client_4 = $request->client_4;
            $customer->dni_4 = $request->dni_4;
            $customer->operations_entry = $request->operations_entry;
            $customer->editors_id = $request->editors_id;
            $customer->days = $request->days;
            $customer->issue_date = $request->issue_date;
            $customer->redaction_observations = $request->redaction_observations;

            // Estado
            $customer->state_id = $request->state_id;

            // Fedateador
            $customer->contract_withdrawal_date = $request->contract_withdrawal_date;
            $customer->elapsed_days = $request->elapsed_days;
            $customer->returned_letters = $request->returned_letters;
            $customer->return_date = $request->return_date;
            $customer->contract_type = $request->contract_type;
            $customer->regularization_observations = $request->regularization_observations;
            $customer->correction_delivery_day = $request->correction_delivery_day;
            $customer->estimated_delivery_day = $request->estimated_delivery_day;
            $customer->actual_delivery_day = $request->actual_delivery_day;
            $customer->regularized_contract_date = $request->regularized_contract_date;
            $customer->regularization_return_time = $request->regularization_return_time;
            $customer->reception_time = $request->reception_time;
            $customer->report_time = $request->report_time;
            $customer->elapsed_time = $request->elapsed_time;
            $customer->indicator = $request->indicator;
            $customer->delivered_to_operations_2 = $request->delivered_to_operations_2;
            $customer->observations = $request->observations;

            // Tesorería - Archivo
            $customer->commission_paid = $request->commission_paid;
            $customer->contract_scanned = $request->contract_scanned;

            // Desistimiento
            $customer->cancellation_request_type = $request->cancellation_request_type;
            $customer->cancellation_date = $request->cancellation_date;
            $customer->cancelled_by = $request->cancelled_by;
            $customer->physical_contract = $request->physical_contract;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->signed_agreement = $request->signed_agreement;
            $customer->receipts = $request->receipts;
            $customer->operation_type = $request->operation_type;
            $customer->observation = $request->observation;
            $customer->lot_status = $request->lot_status;
            // sin grupo
            $customer->created_by = Auth::user()->id;
            $customer->updated_by = Auth::user()->id;

            // Guardar en la base de datos
            $customer->save();
        } catch (\Exception $e) {
            Log::error('Error al guardar el cliente: ' . $e->getMessage(), [
                'request' => $request->all(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e; // O puedes devolver un response con error si prefieres
        }
        return $this->create();
    }

    public function storePublic(StoreCustomerRequest $request)
    {
        $data = $request->validated();

        $Customer = new Customer();
        $Customer->client_1 = $data['names'];
        $Customer->dni_1 = $data['dni'];
        $Customer->project_id = $data['project_id'];
        $Customer->phone = $data['code_country'] . $data['cellphone'];
        $Customer->message = $data['message'] ?? '';
        $Customer->save();
    }

    public function ProjectList()
    {
        return Project::orderBy('id', 'DESC')->get();
    }

    public function edit(Request $request)
    {
        return Customer::find($request->id);
    }

    public function update(Request $request)
    {
        $customer=Customer::find($request->id);
        $grupos = [
            'comercial' => [
                'project_id', 'mz_lt', 'client_1', 'dni_1', 'business_partners_id',
                'separation_date', 'separation_amount', 'assistant_id',
                'initial_paid', 'initial_payment_date', 'initial_amount'
            ],
            'socio_comercial' => [
                // Puedes agregar campos específicos si este grupo incluye otros distintos
            ],
            'redaccion' => [
                'client_2', 'dni_2', 'client_3', 'dni_3', 'client_4', 'dni_4',
                'operations_entry', 'editors_id', 'days', 'issue_date', 'redaction_observations'
            ],
            'estado' => ['state_id'],
            'fedateador' => [
                'contract_withdrawal_date', 'elapsed_days', 'returned_letters', 'return_date',
                'contract_type', 'regularization_observations', 'correction_delivery_day',
                'estimated_delivery_day', 'actual_delivery_day', 'regularized_contract_date',
                'regularization_return_time', 'reception_time', 'report_time', 'elapsed_time',
                'indicator', 'delivered_to_operations_2', 'observations'
            ],
            'desistimiento' => [
                'cancellation_request_type', 'cancellation_date', 'cancelled_by', 'physical_contract',
                'phone', 'email', 'signed_agreement', 'receipts', 'operation_type', 'observation',
                'lot_status'
            ],
        ];
        foreach ($grupos as $permiso => $campos) {
            if (Auth::user()->hasPermissionTo($permiso) || Auth::user()->hasPermissionTo('administrar')) {
                foreach ($campos as $campo) {
                    if ($request->has($campo)) {
                        $customer->$campo = $request->$campo;
                    }
                }
            }
        }
        $customer->updated_by = Auth::id();
        $customer->save();

        return $this->create();
    }

    public function destroy(Request $request)
    {
        Customer::find($request->id)->delete();
        return $this->create();
    }

    public function count()
    {
        $count = new stdClass();

        $count->project_customer_count = Customer::join('projects', 'customers.project_id', '=', 'projects.id')
            ->select('projects.id', 'projects.description', DB::raw('count(*) as count'))
            ->groupBy('projects.description', 'projects.id')
            ->orderByDesc('count')->get();

        $count->project_editor_count = Customer::join('editors', 'customers.editors_id', '=', 'editors.id')
            ->select('editors.id', 'editors.description', DB::raw('count(*) as count'))
            ->groupBy('editors.description', 'editors.id')
            ->orderByDesc('count')->get();

        $count->project_business_count = Customer::join('business_partners', 'customers.business_partners_id', '=', 'business_partners.id')
            ->select('business_partners.id', 'business_partners.description', DB::raw('count(*) as count'))
            ->groupBy('business_partners.description', 'business_partners.id')
            ->orderByDesc('count')->get();

        return $count;
    }
}
