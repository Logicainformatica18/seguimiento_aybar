<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Customer::create([
                'project_id' => 1,
                'mz_lt' => 'MZ-' . chr(64 + $i) . ' LT-' . rand(1, 100),
                'client_1' => "Cliente {$i}A",
                'dni_1' => '1234567' . $i,
                'client_2' => "Cliente {$i}B",
                'dni_2' => '2234567' . $i,
                'client_3' => "Cliente {$i}C",
                'dni_3' => '3234567' . $i,
                'client_4' => "Cliente {$i}D",
                'dni_4' => '4234567' . $i,
                'client_5' => "Cliente {$i}E",
                'dni_5' => '5234567' . $i,
                'business_partners_id' => 1,
                'separation_date' => Carbon::now()->subDays(rand(10, 50)),
                'separation_amount' => rand(500, 1500),
                'assistant_id' => 1,
                'initial_paid' => rand(300, 1200),
                'initial_payment_date' => Carbon::now()->subDays(rand(5, 10)),
                'initial_amount' => rand(2000, 5000),
                'state_id' => 1,
                'editors_id' => 1,
                'operations_entry' => Carbon::now()->subDays(rand(1, 5)),
                'days' => rand(1, 30),
                'drafted_by' => 'Asistente ' . $i,
                'issue_date' => Carbon::now()->subDays(rand(1, 10)),
                'redaction_observations' => 'Observaciones redactadas ' . $i,
                'contract_withdrawal_date' => Carbon::now()->subDays(rand(1, 20)),
                'elapsed_days' => rand(5, 30),
                'returned_letters' => rand(0, 5),
                'return_date' => Carbon::now(),
                'contract_type' => 'Tipo ' . rand(1, 3),
                'regularization_observations' => 'Observación regularización ' . $i,
                'correction_delivery_day' => Carbon::now()->addDays(5),
                'estimated_delivery_day' => Carbon::now()->addDays(7),
                'actual_delivery_day' => Carbon::now()->addDays(10),
                'regularized_contract_date' => Carbon::now(),
                'regularization_return_time' => Carbon::now()->format('H:i:s'),
                'reception_time' => Carbon::now()->subMinutes(rand(10, 60))->format('H:i:s'),
                'report_time' => Carbon::now()->subMinutes(rand(5, 30))->format('H:i:s'),
                'elapsed_time' => rand(1, 5) . ' días',
                'indicator' => 'Indicador ' . $i,
                'delivered_to_operations_2' => (bool)rand(0, 1),
                'observations' => 'Observaciones adicionales ' . $i,
                'commission_paid' => (bool)rand(0, 1),
                'contract_scanned' => (bool)rand(0, 1),
                'cancellation_request_type' => 'Tipo ' . rand(1, 2),
                'cancellation_date' => Carbon::now()->addDays(rand(1, 15)),
                'cancelled_by' => 'Usuario ' . 1,
                'physical_contract' => (bool)rand(0, 1),
                'phone' => '99988877' . $i,
                'email' => "cliente{$i}@correo.com",
                'signed_agreement' => (bool)rand(0, 1),
                'receipts' => (bool)rand(0, 1),
                'operation_type' => 'Venta',
                'observation' => 'Observación global ' . $i,
                'lot_status' => 'Reservado',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
