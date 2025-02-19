<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Bus;
class BookController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Book = Book::orderBy('id','DESC')->get();
        return view('Book.Book', compact('Book'));
    }
    public function indexPublic()
    {
        $Book = Book::all();
        return view('Book.BookPublic', compact('Book'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Book = Book::orderBy('id','DESC')->get();
        return view('Book.Booktable', compact('Book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePublic(Request $request)
    {      // $request->validate([
        //     'firstname' => 'required|string|max:255',
        //     'lastname' => 'required|string|max:255',
        //     'names' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'document_type' => 'required|string|max:255',
        //     'document_number' => 'required|string|max:20',
        //     'phone' => 'required|string|max:20',
        //     'email' => 'required|email|max:255',
        //     'claim_type' => 'required|string|max:20',
        //     'claimed_amount' => 'required|numeric|min:0',
        //     'currency_type' => 'required|string|max:10',
        //     'office_address' => 'required|string|max:255',
        //     'product_or_service_description' => 'required|string',
        //     'complaint_type' => 'required|string|max:50',
        //     'complaint_details' => 'required|string|max:50',
        //     'complaint_request' => 'required|string|max:50',
        // ]);
  
        try {

            $Book_one = Book::where("email", "=", $request->email)->where("state","<>", "Finalizado")->first();
            if ($Book_one) {
                return $Book_one;
            } else {

                $Book = new Book();
                $Book->firstname = $request->firstname;
                $Book->lastname = $request->lastname;
                $Book->names = $request->names;
                $Book->address = $request->address;
                $Book->document_type = $request->document_type;
                $Book->document_number = $request->document_number;
                $Book->phone =  $request->code_country. $request->phone;
                $Book->email = $request->email;
                $Book->claim_type = $request->claim_type;
                $Book->claimed_amount = $request->claimed_amount;
                $Book->currency_type = $request->currency_type;
                $Book->office_address = $request->office_address;
                $Book->product_or_service_description = $request->product_or_service_description;
                $Book->complaint_type = $request->complaint_type;
                $Book->complaint_details = $request->complaint_details;
                $Book->complaint_request = $request->complaint_request;
                $Book->state = "Pendiente";
                $Book->save();
                $Book->ticket = 'TCK-' . str_pad($Book->id, 6, '0', STR_PAD_LEFT); // Genera un número de ticket con ceros
                $Book->save();

                $name = $request->names;
                $email = $request->email;

            //     Mail::raw("Estimado/a $name,

            // 📩 Hemos recibido su reclamo en nuestro sistema. Agradecemos su tiempo y confianza en nuestro servicio. 
            
            // 🎟️ *Número de Ticket:* $Book->ticket
            
            // Nuestro equipo revisará su solicitud y se pondrá en contacto con usted a la brevedad para brindarle una respuesta. También puede hacer seguimiento a su reclamo utilizando este número de ticket.
            
            // 📧 Se ha enviado esta notificación a su correo para su referencia.
            
            // Si tiene alguna consulta adicional, no dude en escribirnos.
            
            // Atentamente,
            // El equipo de Aybar Corp", function ($message) use ($name, $email) {
            //         $message->to($email)
            //             ->subject('Confirmación de Reclamo - Aybar Corp')
            //             ->from('informesaybar@aybarcorp.com', 'Aybar Corp');
            //     });

               // Ejecutar en segundo plano la notificación a informes
        Bus::dispatch(fn() => $this->notify($Book->id));
                return $Book;
            }
        } catch (\Exception $e) {
            return "Error al enviar el correo: " . $e->getMessage();
        }











        // Guardar en la base de datos

    }

    /**
     * Display the specified resource.
     */
    public function notify($id)
    {
        try {
            // Obtener el registro del libro de reclamaciones
            $Book = Book::findOrFail($id);
        
            // Enviar la notificación a informes
            Mail::send([], [], function ($message) use ($Book) {
                $message->to("informesaybar@aybarcorp.com")
                    ->subject('Reclamo - Aybar Corp Ticket : '. $Book->ticket)
                    ->from('informesaybar@aybarcorp.com', 'Aybar Corp')
                    ->setBody("
        📢 Nueva queja registrada en el libro de reclamaciones de la página Aybar Corp:
        
        👤 *Cliente:* $Book->names $Book->lastname
        📍 *Dirección:* $Book->address
        📞 *Teléfono:* $Book->phone
        📧 *Correo:* $Book->email
        🆔 *Tipo de Documento:* $Book->document_type
        🔢 *Número de Documento:* $Book->document_number
        
        📌 *Tipo de Reclamo:* $Book->claim_type
        💰 *Monto Reclamado:* $Book->claimed_amount $Book->currency_type
        🏢 *Dirección de la Oficina:* $Book->office_address
        
        🛍️ *Descripción del Producto o Servicio:* 
        $Book->product_or_service_description
        ⚠️ *Tipo de Queja:* $Book->complaint_type
        📝 *Detalles de la Queja:* 
        $Book->complaint_details
        
        📢 *Pedido del Cliente:* 
        $Book->complaint_request
        
        🎟️ *Número de Ticket:* $Book->ticket
        🎟️ *Estado:* $Book->state
        
        📌 Se recomienda revisar el caso a la brevedad posible.
                    ", 'text/plain');
            });
        
            return response()->json(['message' => 'Notificación enviada a informes'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al enviar el correo: ' . $e->getMessage()], 500);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $Book = Book::find($request->id);
        return $Book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Book = Book::find($request->id);
        $Book->state = $request->state;
        $Book->message = $request->message;

        $email = $Book->email;
        if ($request->file('file_1') != null) {
            $Book->file_1 = fileStore($request->file('file_1'), "resource");
        }
        if ($request->file('file_2') != null) {
            $Book->file_2 = fileStore($request->file('file_2'), "resource");
        }
        Mail::raw("Estimado/a $Book->name,

        📩 $Book->message.
        
        🎟️ *Número de Ticket:* $Book->ticket
        🎟️ *Estado:* $Book->state
        
        📎 
        " . (!empty($Book->file_1) ? env("APP_URL"). asset("resource/".$Book->file_1) : '') . " 
        " . (!empty($Book->file_2) ? env("APP_URL").asset("resource/".$Book->file_2) : '') . "
        
        Atentamente,
        El equipo de Aybar Corp", function ($message) use ($email) {
            $message->to($email)
                ->subject('Revisión de Reclamo - Aybar Corp')
                ->from('informesaybar@aybarcorp.com', 'Aybar Corp');
        });
        

        
        $Book->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
            $Book = Book::find($request->id);
           return $Book->delete();
            
    }
}
