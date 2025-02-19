<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCiteRequest;
use App\Http\Requests\UpdateCiteRequest;
use stdClass;
class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $total_cite = Cite::where('estado', 'like', '%')->count();
        $total_pendiente = Cite::where('estado', 'like', 'Pendiente')->count();
        $total_proceso = Cite::where('estado', 'like', 'Proceso')->count();
        $total_atendido = Cite::where('estado', 'like', 'Atendido')->count();
        $total_derivado = Cite::where('estado', 'like', 'Derivado')->count();
        $total_observado = Cite::where('estado', 'like', 'Observado')->count();
        $total_finalizado = Cite::where('estado', 'like', 'Finalizado')->count();
        $total_cerrado = Cite::where('estado', 'like', 'Cerrado')->count();

        $user = Auth::user();
        $id_usuario = $user->id;
        $id_rol = $user->id_rol;
        $id_area = $user->id_area;

        // Obtener el estado desde la URL (?estado=pendiente)
        $estado = $request->estado;

        // Consulta base con LEFT JOIN y LIKE en motivos_cita
        $query = Cite::Join('motivos_cita', function ($join) {
            $join->on(DB::raw("CONCAT('%', citas.motivo, '%')"), 'LIKE', DB::raw("CONCAT('%', motivos_cita.nombre_motivo, '%')"));
        })
            ->select('citas.*')
            ->orderBy('codigo', 'asc');

        // Aplicar filtro sin filtro por area solo por estado,
        if ($estado == 'Todos') {
            $estado = '%';
        }
        $query->where('citas.estado', 'like', $estado);
        $cite = $query->paginate(7);

        // if ($id_usuario == 19 || $id_usuario == 38 || $id_rol == 1 || ($id_rol == 5 && empty($id_area))) {
        //     // Si el rol es 1 o 5 y no tiene área, mostramos todas las citas

        //     $query = Cite::LeftJoin('motivos_cita', function ($join) {
        //         $join->on(DB::raw("CONCAT('%', citas.motivo, '%')"), 'LIKE', DB::raw("CONCAT('%', motivos_cita.nombre_motivo, '%')"));
        //     })
        //         ->select('citas.*')
        //         ->orderBy('codigo', 'asc');
        //     $query->where('citas.estado', 'like', $estado);
        //     $cite = $query->paginate(7);
        // } elseif ($id_rol == 5 && !empty($id_area)) {
        //     // Obtener las áreas habilitadas del usuario
        //     $areas = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

        //     if (!empty($areas)) {
        //         $cite = $query->whereIn('motivos_cita.id_area', $areas)->paginate(7);
        //     } else {
        //         $cite = $query->where('motivos_cita.id_area', $id_area)->paginate(7);
        //     }
        // } elseif ($id_rol == 4 || in_array($id_area, [1, 2, 3])) {
        //     // Obtener las áreas habilitadas del usuario
        //     $areas = User::where('id_usuario', $id_usuario)->where('habilitado', 0)->pluck('id_area')->toArray();

        //     if (!empty($areas)) {
        //         $cite = $query->whereIn('motivos_cita.id_area', $areas)->paginate(7);
        //     } else {
        //         $cite = $query->where('motivos_cita.id_area', $id_area)->paginate(7);
        //     }
        // } else {
        //     // Si el usuario no está en ningún grupo especial, se filtra por su área
        //     $cite = $query->where('motivos_cita.id_area', $id_area)->paginate(7);
        // }

        return view('Cite.cite', compact('cite','total_cite','total_pendiente','total_proceso','total_atendido','total_derivado','total_observado','total_finalizado','total_cerrado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function validate_user(Request $request)
    {
        // Buscar el usuario por ID
        $user = User::where('id_usuario', '=', $request->id_usuario)->first();

        if ($user != '') {
            // Iniciar sesión manualmente con Auth
            Auth::login($user);

            // Redirigir a la página deseada
            return redirect()->route('citas.index', ['estado' => 'Todos']);
        } else {
            return 'error';
        }
    }

    public function update_state()
    {
        try {
            DB::statement("
           UPDATE citas c
    JOIN (
        SELECT
            co.id_cita,
            co.estado AS nuevo_estado
        FROM comentarios co
        WHERE co.id_comentario = (
            SELECT MAX(co2.id_comentario)
            FROM comentarios co2
            WHERE co2.id_cita = co.id_cita
        )
    ) AS subquery
    ON c.id_cita = subquery.id_cita
    SET c.estado = subquery.nuevo_estado;
");

            return response()->json(['status' => 'success', 'message' => 'Estados actualizados correctamente']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCiteRequest $request)
    {
        //
    }
    public function count()
    {
        $cite = new stdClass();
        $estadoCounts = Cite::select('estado', \DB::raw('count(*) as count'))
                            ->groupBy('estado')
                            ->get()
                            ->keyBy('estado')
                            ->map(function ($item) {
                                return $item->count;
                            });

        $cite->total = $estadoCounts->sum(); // Total count of all states

        // Assigning individual state counts
        $cite->total_pendiente = $estadoCounts->get('Pendiente', 0);
        $cite->total_proceso = $estadoCounts->get('Proceso', 0);
        $cite->total_atendido = $estadoCounts->get('Atendido', 0);
        $cite->total_derivado = $estadoCounts->get('Derivado', 0);
        $cite->total_observado = $estadoCounts->get('Observado', 0);
        $cite->total_finalizado = $estadoCounts->get('Finalizado', 0);
        $cite->total_cerrado = $estadoCounts->get('Cerrado', 0);
        return $cite;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $cite = Cite::where("id_cita","=",$request->id)->first();
        return $cite;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCiteRequest $request, Cite $cite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cite $cite)
    {
        //
    }
}
