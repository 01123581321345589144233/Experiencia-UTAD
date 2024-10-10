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
        Schema::create('tagged_projetos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTag')->constrained('tags_projetos');
            $table->foreignId('idProjeto')->constrained('projetos');
        });

        Schema::create('tagged_utilizadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTag')->constrained('tags_utilizadores');
            $table->foreignId('idAluno')->constrained('alunos')->nullable(true)->default(NULL);
            $table->foreignId('idProfessor')->constrained('professores')->nullable(true)->default(NULL);
            $table->foreignId('idProfissional')->constrained('profissionais')->nullable(true)->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagged_projetos');
        Schema::dropIfExists('tagged_utilizadores');
    }
};
