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
        Schema::create('schools', function (Blueprint $table) {
            $table->uuid('id')->primary();                        // Usando UUID como chave primária
            $table->string('name');                                // Nome da escola
            $table->string('cnpj', 18);                            // CNPJ da escola
            $table->string('phone_number')->nullable();            // Número de telefone da escola
            $table->string('email')->nullable();                   // E-mail de contato da escola
            $table->foreignUuid('address_id')->constrained('addresses'); // Referência para a tabela 'addresses'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_config');
    }
};
