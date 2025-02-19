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
        Schema::table('users', function (Blueprint $table) {
        
            $table->string("fb")->nullable();
            $table->string("github")->nullable();
            $table->string("portfolio")->nullable();
            $table->string("youtube")->nullable();
            $table->string("instagram")->nullable();
                    

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
