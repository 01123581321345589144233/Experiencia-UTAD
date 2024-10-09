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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false);
            $table->string('email', 150)->unique();
            $table->string('password', 50)->nullable(false);
            $table->foreignId('idCurso')->constrained('cursos');
        });

        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false);
            $table->string('email', 150)->unique();
            $table->string('password', 50)->nullable(false);
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->boolean('manager')->default(0);
            $table->string('ofUnderName')->nullable(false)->unique();
            $table->string('password', 50)->nullable(false);
            $table->timestamp('dataAtualizacao');
        });

        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false);
            $table->string('CAE')->nullable(false);
            $table->string('descricaoFuncoes', 255)->nullable(false);
            $table->string('email', 150)->nullable(false)->unique();
            $table->string('password', 50)->nullable(false);
            $table->timestamp('dataRegisto');
            $table->timestamp('dataAdesao');
            $table->string('recomendadoPor', 100);
            $table->integer('aprovadoPor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
        Schema::dropIfExists('professores');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('profissionais');
        
    }
};
