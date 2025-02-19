<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;
    protected $table ="citas";
    protected $fillable = [
        'codigo',
        'id_cliente',
        'tipo',
        'fecha',
        'hora',
        'hora_final',
        'motivo',
        'descripcion',
        'id_rol',
        'id_usuario',
        'estado',
        'fechag',
        'horag',
        'archivo',
        'comentario_jefe',
        'valor',
        'generado',
        'empresa',
        'proyecto',
        'manzana',
        'lote',
        'fecha_repro',
        'hora_repro',
        'estado_derivacion',
        'comentario_derivacion',
        'enviado_jefe',
        'enviado_area',
        'motivo_copia',
        'proceso_derivacion',
        'confirmar',
        'habilitado',
    ];
    public function customer(){
        return $this->belongsTo("App\Models\Customer", 'id_cliente', 'id_cliente');
    }
    public function motivo(){
        return $this->belongsTo("App\Models\Reason_appointment", 'motivo', 'nombre_motivo');
    }

}
