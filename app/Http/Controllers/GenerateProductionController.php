<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Section;
use Illuminate\Http\Request;

class GenerateProductionController extends Controller
{
    public function generate(Request $request)
{
    // Obtener datos de la base de datos
    $sections = Section::where("module", "=", $request->module)->orderBy("nivel","asc")->get();
    
    $page = "views/production/".$request->module.".blade.php";

    
    // Leer el contenido actual del archivo
    $filePath = resource_path($page);
    $currentContent = File::exists($filePath) ? File::get($filePath) : '';

    // Iniciar el contenido que deseas reemplazar
    $newContent = '';
    $counter =0;
    foreach ($sections as $section) {
       $counter += 1;

       $newContent .= $section->code . "\n";
       if ($request->module==1&& $counter===1) {
        $newContent .= "@yield('content')" . "\n";
    }
      
       
     
    }

    // Buscar la sección a modificar
    $startMarker = '<!-- INICIO SECCION -->';
    $endMarker = '<!-- FIN SECCION -->';

    // Buscar y reemplazar la sección específica
    $pattern = "/".preg_quote($startMarker, '/')."(.*?)".preg_quote($endMarker, '/')."/s";
    if (preg_match($pattern, $currentContent)) {
        // Reemplazar el contenido entre los marcadores
        $updatedContent = preg_replace($pattern, $startMarker . "\n" . $newContent . $endMarker, $currentContent);
    } else {
        // Si los marcadores no existen, añadirlos al archivo
        $updatedContent = $currentContent . "\n" . $startMarker . "\n" . $newContent . $endMarker;
    }

    // Escribir el contenido actualizado de nuevo en el archivo
    File::put($filePath, $updatedContent);

    // Retornar una respuesta
    return response()->json([
        'message' => 'El archivo  ha sido actualizado correctamente.',
        'filePath' => $filePath,
    ]);
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
