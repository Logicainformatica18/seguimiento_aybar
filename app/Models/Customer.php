<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['proyecto_2', 'proyecto', 'project_id', 'lote', 'aux', 'dni', 'cliente_1', 'dni_2', 'cliente_2', 'dni_3', 'cliente_3', 'dni_4', 'cliente_4', 'dni_5', 'cliente_5', 'socio_comercial', 'socio_comercial_', 'business_partners_id', 'fecha_de_separacion', 'precio_de_lista_inventario', 'descuento_porcentaje', 'importe_de_venta', 'estado', 'estado_', 'statuses_id', 'dias_1', 'redactado_por', 'editors_id', 'ingreso_a_operaciones', 'redactado', 'recogido_no_devuelto', 'dias_2', 'fecha_contrato_firmado_devuelto', 'adenda_refinanciamiento', 'j2', 'enviado_a_archivo', 'virtual', 'notaria', 'chincha', 'post_venta', 'proceso_de_desistimiento', 'proceso_de_resolucion', 'cambio_de_titular', 'desistimiento', 'comisiones', 'cantidad_de_letras', 'letras_verificadas', 'observaciones', 'created_at', 'updated_at'];

    public function Business_partner()
    {
        return $this->belongsTo(Business_partner::class, 'business_partners_id', 'id');
    }
    public function Status()
    {
        return $this->belongsTo(Status::class, 'state_id', 'id');
    }
    public function Editor()
    {
        return $this->belongsTo(Editor::class, 'editors_id', 'id');
    }
    public function Project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
