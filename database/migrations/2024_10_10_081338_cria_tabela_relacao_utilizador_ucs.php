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
        Schema::create('alunos_ucs', function (Blueprint $table) {
            $table->foreignId('idAluno')->constrained('alunos');
            $table->foreignId('idUC')->constrained('unidades_curriculares');
            $table->date('anoLetivo')->primary();
            $table->enum('status', ['concluida', 'inativo', 'inscrita']);
        });

        Schema::create('professores_ucs', function (Blueprint $table) {
            $table->foreignId('idProfessor')->constrained('professores');
            $table->foreignId('idUC')->constrained('unidades_curriculares');
            $table->date('anoLetivo')->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos_ucs');
        Schema::dropIfExists('professores_ucs');
    }
};
