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
        Schema::create('insurance_plan', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de ID autoincremento
            $table->string('plan_descricao');
            $table->string('plan_telefone');
            $table->timestamps(); // Adiciona colunas created_at e updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_plan');
    }
};
