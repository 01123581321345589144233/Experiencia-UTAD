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
        Schema::create('tags_utilizadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false);
            $table->string('descricao', 250)->nullable(false);
        });

        Schema::create('tags_projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->nullable(false)->unique();
            $table->string('descricao', 250);
            $table->enum('status', ['aprovado', 'avaliar']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_utilizadores');
        Schema::dropIfExists('tags_projetos');
        
    }
};
