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
        $Customer = new Customer();
        $Customer->client_1 = $request->client_1;
        $Customer->dni_1 = $request->dni_1;
        $Customer->project_id = $request->project_id;
        $Customer->phone = $request->phone;
        $Customer->email = $request->email;
        $Customer->message = $request->message;
        $Customer->save();
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
        $Customer = Customer::find($request->id);
        $Customer->client_1 = $request->client_1;
        $Customer->dni_1 = $request->dni_1;
        $Customer->project_id = $request->project_id;
        $Customer->phone = $request->phone;
        $Customer->email = $request->email;
        $Customer->message = $request->message;
        $Customer->save();
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
