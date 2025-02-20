<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Clave primaria (BIGINT UNSIGNED AUTO_INCREMENT)
            $table->string('proyecto_2', 255)->nullable();
            $table->string('proyecto', 255)->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('lote', 255)->nullable();
            $table->double('aux')->nullable();
            $table->string('dni', 255)->nullable();
            $table->string('cliente_1', 255)->nullable();
            $table->string('dni_2', 255)->nullable();
            $table->string('cliente_2', 255)->nullable();
            $table->string('dni_3', 255)->nullable();
            $table->string('cliente_3', 255)->nullable();
            $table->string('dni_4', 255)->nullable();
            $table->string('cliente_4', 255)->nullable();
            $table->string('dni_5', 255)->nullable();
            $table->string('cliente_5', 255)->nullable();
            $table->string('socio_comercial', 255)->nullable();
            $table->string('socio_comercial_', 255)->nullable();
            $table->unsignedBigInteger('business_partners_id')->nullable();
            $table->dateTime('fecha_de_separacion')->nullable();
            $table->string('precio_de_lista_inventario', 255)->nullable();
            $table->string('descuento_porcentaje', 255)->nullable();
            $table->double('importe_de_venta')->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('estado_', 255)->nullable();
            $table->unsignedBigInteger('statuses_id')->nullable();
            $table->double('dias_1')->nullable();
            $table->string('redactado_por', 255)->nullable();
            $table->unsignedBigInteger('editors_id')->nullable();
            $table->dateTime('ingreso_a_operaciones')->nullable();
            $table->dateTime('redactado')->nullable();
            $table->dateTime('recogido_no_devuelto')->nullable();
            $table->double('dias_2')->nullable();
            $table->dateTime('fecha_contrato_firmado_devuelto')->nullable();
            $table->string('adenda_refinanciamiento', 255)->nullable();
            $table->dateTime('j2')->nullable();
            $table->dateTime('enviado_a_archivo')->nullable();
            $table->dateTime('virtual')->nullable();
            $table->dateTime('notaria')->nullable();
            $table->dateTime('chincha')->nullable();
            $table->dateTime('post_venta')->nullable();
            $table->dateTime('proceso_de_desistimiento')->nullable();
            $table->dateTime('proceso_de_resolucion')->nullable();
            $table->dateTime('cambio_de_titular')->nullable();
            $table->dateTime('desistimiento')->nullable();
            $table->string('comisiones', 255)->nullable();
            $table->double('cantidad_de_letras')->nullable();
            $table->string('letras_verificadas', 255)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps(); // created_at y updated_at

            // Llaves foráneas
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action')->onUpdate('no action');
            $table->foreign('statuses_id')->references('id')->on('statuses')->onDelete('no action')->onUpdate('no action');
            $table->foreign('business_partners_id')->references('id')->on('business_partners')->onDelete('no action')->onUpdate('no action');
            $table->foreign('editors_id')->references('id')->on('editors')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
