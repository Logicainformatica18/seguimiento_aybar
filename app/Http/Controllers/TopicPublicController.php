<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
class TopicPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Obtener datos desde la base de datos
    $topics = Topic::all(); // Ejemplo: obtén todos los registros de la tabla `topics`

    // Retornar datos en formato JSON
    return response()->json([
        'data' => $topics, // El contenido que necesitas enviar
    ]);
    }
    public function report(Request $request)
    {
        $topic = Topic::where("url", "=", $request->url)->first();
        if ($topic=="") {
            abort(404);
        }
        else{
            return view("topic.topic_detail", compact("topic"));

        }
        
  
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
