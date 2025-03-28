<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(Business_partnerSeeder::class);
      $this->call(PermissionsSeeder::class);
      $this->call(CategorySeeder::class);
      $this->call(TypeSeeder::class);
      $this->call(StatusSeeder::class);
      $this->call(EditorSeeder::class);
      $this->call(ProjectSeeder::class);
      $this->call(CustomerSeeder::class);

  //    $this->call(TopicSeeder::class);

    }
}
