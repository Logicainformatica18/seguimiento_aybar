<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'rol'; // Nombre exacto de la tabla en la BD

    protected $primaryKey = 'id_rol'; // Definimos la clave primaria

    public $timestamps = false; // Si la tabla no tiene `created_at` y `updated_at`

    protected $fillable = [
        'descripcion',
        'habilitado',
    ];
}
