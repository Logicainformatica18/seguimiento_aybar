<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['description' => 'SEPERADO', 'detail' => ''],
            ['description' => 'REDACTADO', 'detail' => ''],
            ['description' => 'RECOGIDO NO DEVUELTO', 'detail' => ''],
            ['description' => 'APLAZAMIENTO DE FIRMA', 'detail' => ''],
            ['description' => 'CAMBIO DE LOTE', 'detail' => ''],
            ['description' => 'CAMBIO DE TITULAR', 'detail' => ''],
            ['description' => 'COMISIONES', 'detail' => ''],
            ['description' => 'DEVUELTO A OPERACIONES', 'detail' => ''],
            ['description' => 'ENVIADO A ARCHIVOS', 'detail' => ''],
            ['description' => 'NOTARIA', 'detail' => ''],
            ['description' => 'OPERACIONES', 'detail' => ''],
            ['description' => 'REDACTADO  NO PROGRAMADO', 'detail' => ''],
            ['description' => 'REDACTADO PROGRAMADO', 'detail' => ''],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
