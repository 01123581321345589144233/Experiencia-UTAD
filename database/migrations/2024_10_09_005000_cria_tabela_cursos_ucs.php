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
        Schema::create('unidades_curriculares', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false);
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('unidades_curriculares');
        
    }
};
