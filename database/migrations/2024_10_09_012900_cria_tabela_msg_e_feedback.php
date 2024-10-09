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
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idAluno')->constrained('alunos')->nullable(true)->default(NULL);
            $table->foreignId('idProfessor')->constrained('professores')->nullable(true)->default(NULL);
            $table->foreignId('idProfissional')->constrained('profissionais')->nullable(true)->default(NULL);
            $table->timestamp('dataRegisto');
            $table->text('conteudo')->nullable(false);
        });

        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idAplicacao')->constrained('aplicacoes')->nullable(false);
            $table->foreignId('idAluno')->constrained('alunos')->nullable(true)->default(NULL);
            $table->foreignId('idProfessor')->constrained('professores')->nullable(true)->default(NULL);
            $table->foreignId('idProfissional')->constrained('profissionais')->nullable(true)->default(NULL);
            $table->timestamp('dataRegisto');
            $table->text('conteudo')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensagens');
        Schema::dropIfExists('feedbacks');
        
    }
};
