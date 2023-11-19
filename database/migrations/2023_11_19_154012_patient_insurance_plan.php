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
        Schema::create('patient_insurance_plan', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de ID autoincremento
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('insurance_plan_id');
            $table->string('contract_number');
            $table->timestamps(); // Adiciona colunas created_at e updated_at automaticamente

            $table->foreign('patient_id')->references('id')->on('patient');
            $table->foreign('insurance_plan_id')->references('id')->on('insurance_plan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_insurance_plan');
    }
};
