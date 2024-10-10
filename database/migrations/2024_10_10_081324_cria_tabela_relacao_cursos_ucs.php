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
        Schema::create('cursos_ucs', function (Blueprint $table) {
            $table->foreignId('idUC')->constrained('unidades_curriculares');
            $table->foreignId('idCurso')->constrained('cursos');
            $table->integer('semestre');
            $table->date('anoLetivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos_ucs');
    }
};
