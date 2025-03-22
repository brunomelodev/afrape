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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();          // Usando UUID como chave primária
            $table->string('street');               // Nome da rua
            $table->string('number');               // Número do endereço
            $table->string('complement')->nullable(); // Complemento
            $table->string('neighborhood');         // Bairro
            $table->string('city');                 // Cidade
            $table->string('state', 2);             // Estado (usando código de dois caracteres)
            $table->string('postal_code');          // Código postal (CEP)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
