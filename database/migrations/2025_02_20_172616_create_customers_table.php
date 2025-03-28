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

                $table->id();
                   // Llaves foráneas
                   $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action')->onUpdate('no action');

            $table->string('mz_lt')->nullable();
                $table->string('client_1')->nullable();
                $table->string('dni_1')->nullable();
                $table->string('client_2')->nullable();
                $table->string('dni_2')->nullable();
                $table->string('client_3')->nullable();
                $table->string('dni_3')->nullable();
                $table->string('client_4')->nullable();
                $table->string('dni_4')->nullable();
                $table->string('client_5')->nullable();
                $table->string('dni_5')->nullable();
                $table->bigInteger('business_partners_id')->unsigned();
                $table->foreign('business_partners_id')->references('id')->on('business_partners')->onDelete('no action')->onUpdate('no action');
                $table->date('separation_date')->nullable();

                $table->decimal('separation_amount', 10, 2)->nullable();

                $table->bigInteger('assistant_id')->unsigned();
                $table->foreign('assistant_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
                $table->decimal('initial_paid', 10, 2)->nullable();
                $table->date('initial_payment_date')->nullable();
                $table->decimal('initial_amount', 10, 2)->nullable();
                $table->bigInteger('state_id')->unsigned();
                $table->foreign('state_id')->references('id')->on('statuses')->onDelete('no action')->onUpdate('no action');

                $table->bigInteger('editors_id')->unsigned();
                $table->foreign('editors_id')->references('id')->on('editors')->onDelete('no action')->onUpdate('no action');
                $table->date('operations_entry')->nullable();
                $table->integer('days')->nullable();
                $table->string('drafted_by')->nullable();
                $table->date('issue_date')->nullable();
                $table->text('redaction_observations')->nullable();
                $table->date('contract_withdrawal_date')->nullable();
                $table->integer('elapsed_days')->nullable();
                $table->integer('returned_letters')->nullable();
                $table->date('return_date')->nullable();
                $table->string('contract_type')->nullable();
                $table->text('regularization_observations')->nullable();
                $table->date('correction_delivery_day')->nullable();
                $table->date('estimated_delivery_day')->nullable();
                $table->date('actual_delivery_day')->nullable();
                $table->date('regularized_contract_date')->nullable();
                $table->time('regularization_return_time')->nullable();
                $table->time('reception_time')->nullable();
                $table->time('report_time')->nullable();
                $table->string('elapsed_time')->nullable();
                $table->string('indicator')->nullable();
                $table->boolean('delivered_to_operations_2')->nullable();
                $table->text('observations')->nullable();
                $table->boolean('commission_paid')->nullable();
                $table->boolean('contract_scanned')->nullable();
                $table->string('cancellation_request_type')->nullable();
                $table->date('cancellation_date')->nullable();
                $table->string('cancelled_by')->nullable();
                $table->boolean('physical_contract')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->boolean('signed_agreement')->nullable();
                $table->boolean('receipts')->nullable();
                $table->string('operation_type')->nullable();
                $table->text('observation')->nullable();
                $table->string('lot_status')->nullable();
                $table->timestamps();





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
