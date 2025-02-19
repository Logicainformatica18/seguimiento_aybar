<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_area'; // Clave primaria

    protected $fillable = [
        'descripcion',
        'habilitado',
    ];
}
