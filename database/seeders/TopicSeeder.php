<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::create([
            
            'user_id' => '1',
            'description' => 'Sql Server',
            'detail' =>'detalles',
            'instruction' =>'Instrucciones',
                'video'=> 'https://www.youtube.com/watch?v=DFg1V-rO6Pg',
            'type' => 'video',
            'url' => 'sql-server',
            
        ]);
        Topic::create([
            
            'user_id' => '1',
            'description' => 'Python',
            'detail' =>'detalles',
            'instruction' =>'Instrucciones',
                'video'=> 'https://www.youtube.com/watch?v=DFg1V-rO6Pg',
                'url' => 'sql-server-2',
                'type' => 'video',
        ]);
    }
}
