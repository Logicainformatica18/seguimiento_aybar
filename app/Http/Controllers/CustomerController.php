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
use Carbon\Carbon;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $proyecto = $request->query('proyecto', '');
        $estado = $request->query('estado', '');
        $socio_comercial = $request->query('socio_comercial', '');
        $letras_verificada = $request->query('letras_verificada', '');
        $editor_query = $request->query('editor_query', ''); // Renombrado

        $Project = Project::orderBy('id', 'DESC')->get();
        $state = Status::orderBy('id', 'DESC')->get();
        $business_partner = Business_partner::orderBy('id', 'DESC')->get();
        $editor = Editor::orderBy('id', 'DESC')->get(); // No sobrescribe la variable del request
        $letras_verificadas = Customer::select('letras_verificadas')->orderBy('letras_verificadas', 'asc')->where('letras_verificadas', '<>', '')->distinct()->get();

        $Customer = Customer::query();

        // Aplicar filtros si hay valores en la query
        if (!empty($proyecto)) {
            $Customer->where('customers.project_id', 'like', $proyecto);
        }
        if (!empty($estado)) {
            $Customer->where('customers.state_id', 'like', $estado);
        }
        if (!empty($socio_comercial)) {
            $Customer->where('customers.business_partners_id', 'like', $socio_comercial);
        }
        if (!empty($letras_verificada)) {
            $Customer->where('customers.letras_verificadas', 'like', $letras_verificada);
        }
        if (!empty($editor_query)) {
            $Customer->where('customers.editors_id', 'like', $editor_query);
        }

        $Customer = $Customer->orderBy('customers.id', 'DESC')->paginate(10)->appends($request->query());

        return view('Customer.Customer', compact('Customer', 'Project', 'state', 'business_partner', 'editor', 'letras_verificadas'));
    }
    public function dashboard()
    {
        $count = $this->count();
        return view('Customer.Customer_dashboard', compact('count'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function show(Request $request)
    {
        $Customer = Customer::with('Project') // Cargar la relación
            ->when($request->criterio, function ($query, $criterio) {
                $query
                    ->orWhere('dni', 'like', "%$criterio%")
                    ->orWhere('cliente_1', 'like', "%$criterio%")
                    ->orWhere('cliente_2', 'like', "%$criterio%")
                    ->orWhere('dni_2', 'like', "%$criterio%")
                    ->orWhere('cliente_3', 'like', "%$criterio%")
                    ->orWhere('dni_3', 'like', "%$criterio%")
                    ->orWhere('cliente_4', 'like', "%$criterio%")
                    ->orWhere('dni_4', 'like', "%$criterio%")
                    ->orWhere('cliente_5', 'like', "%$criterio%")
                    ->orWhere('dni_5', 'like', "%$criterio%");
                    // ->orWhereHas('customer', function ($subquery) use ($criterio) {
                    //     $subquery->where('razon_social', 'like', "%$criterio%");
                    // });
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Customer = new Customer();
        $Customer->firstname = $request->firstname;
        $Customer->lastname = $request->lastname;
        $Customer->names = $request->names;
        $Customer->dni = $request->dni;
        $Customer->message = $request->message;
        $Customer->project_id = $request->project_id;
        $Customer->cellphone = $request->cellphone;
        $Customer->save();
        return $this->create();
    }
    public function storePublic(StoreCustomerRequest $request)
    {
        //      funciona localmente con hos
        // $user = User::find(3); // Encuentra al usuario que recibirá la notificación
        // $user->notify(new CustomerNotification());
        //  $name_ =$request->names;
        // // //funciona en goddady
        // Mail::raw('Cliente nuevo: ' . $name_, function ($message) use ($name_) {
        //     $message->to('soporte@aybar.credilotesperu.com') // Cambia por un correo real
        //             ->subject('Un cliente se ha registrado')

        //             ->from('soporte@aybar.credilotesperu.com', 'Credilotes Perú');
        // });

        $data = $request->validated();

        $Customer = new Customer();
        //data es un array
        $Customer->names = $data['names'];
        $Customer->dni = $data['dni'];
        $Customer->project_id = $data['project_id'];
        $Customer->cellphone = $data['code_country'] . $data['cellphone'];
        $Customer->message = $data['message'] ?? '';

        $Customer->save();
    }
    public function ProjectList()
    {
        $Project = Project::orderBy('id', 'DESC')->get();
        return $Project;
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $Customer = Customer::find($request->id);
        return $Customer;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Customer = Customer::find($request->id);
        $Customer->firstname = $request->firstname;
        $Customer->lastname = $request->lastname;
        $Customer->names = $request->names;
        $Customer->dni = $request->dni;
        $Customer->message = $request->message;
        $Customer->project_id = $request->project_id;
        $Customer->cellphone = $request->cellphone;
        $Customer->save();
        return $this->create();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Customer::find($request->id)->delete();
        return $this->create();
    }
    public function count()
    {
        $count = new stdClass();

        $count->project_customer_count = Customer::join('projects', 'customers.project_id', '=', 'projects.id')->select('projects.id', 'projects.description', \DB::raw('count(*) as count'))->groupBy('projects.description', 'projects.id')->orderByDesc('count')->get(); // No usar `count()`, sino `get()` para obtener los datos agrupados

        $count->project_editor_count = Customer::join('editors', 'customers.editors_id', '=', 'editors.id')->select('editors.id', 'editors.description', \DB::raw('count(*) as count'))->groupBy('editors.description', 'editors.id')->orderByDesc('count')->get();
        $count->project_business_count = Customer::join('business_partners', 'customers.business_partners_id', '=', 'business_partners.id')->select('business_partners.id', 'business_partners.description', \DB::raw('count(*) as count'))->groupBy('business_partners.description', 'business_partners.id')->orderByDesc('count')->get();

        return $count;
    }
}
