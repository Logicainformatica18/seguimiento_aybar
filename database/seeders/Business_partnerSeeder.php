<?php

namespace Database\Seeders;
use App\Models\Business_partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Business_partnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business_partner::create(['description' => 'General','detail' =>'']);
    }
}
