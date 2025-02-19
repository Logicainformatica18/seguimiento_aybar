<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason_appointment extends Model
{
    use HasFactory;


    protected $table = 'motivos_cita'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_motivos_cita'; // Clave primaria

    protected $fillable = [
        'nombre_motivo',
        'id_tipo_cita',
        'id_dia_espera',
        'id_areap',
        'habilitado',
    ];

    protected $casts = [
        'habilitado' => 'boolean',
    ];

    // Relación con la tabla `areas`
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }
}
