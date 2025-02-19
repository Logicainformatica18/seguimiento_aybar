<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table ="clientes";
    protected $fillable = [
        'id_slin',
        'Codigo',
        'Razon_Social',
        'T.Doc.',
        'DNI',
        'NIT',
        'Direccion',
        'Ubigeo',
        'Departamento',
        'Provincia',
        'Distrito',
        'Telefono',
        'Email',
        'id_rol',
        'clave',
        'c_clave',
        'ref_telefono1',
        'ref_telefono2',
        'comentario',
        'canal',
        'habilitado',
    ];

    protected $casts = [
        'c_clave' => 'boolean',
        'habilitado' => 'boolean',
    ];

    // Relación con la tabla 'rol'
    // public function rol()
    // {
    //     return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    // }


}
