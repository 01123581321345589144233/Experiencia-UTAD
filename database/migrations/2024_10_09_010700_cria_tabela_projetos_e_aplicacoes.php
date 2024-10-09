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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150)->nullable(false);
            $table->text('descricao')->nullable(false);
            $table->enum('status', ['ativo', 'concluido']);
            $table->date('dataFinal');
            $table->foreignId('idProfissional')->constrained('profissionais')->nullable(true)->default(NULL);
            $table->foreignId('idProfessor')->constrained('professores')->nullable(true)->default(NULL);
            $table->timestamp('dataRegisto');
            $table->timestamp('dataAtualizacao');
        });

        Schema::create('aplicacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProjeto')->constrained('projetos')->nullable(false);
            $table->foreignId('idAluno')->constrained('alunos')->nullable(false);
            $table->enum('status', ['ativo', 'inativo']);
            $table->timestamp('dataRegisto');
            $table->timestamp('dataAtualizacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
        Schema::dropIfExists('aplicacoes');
        
    }
};
