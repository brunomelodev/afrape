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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('cpf', 14); 
            $table->string('rg',20);
            $table->date('birthday')->nullable();
            $table->string('nis',20)->nullable();
            $table->string('ra',20)->nullable();

            // $table->string('cep',9)->nullable();
            // $table->string('address',255)->nullable();
            // $table->string('number',10)->nullable();
            // $table->string('district',100)->nullable();
            // $table->string('city',100)->nullable();
            // $table->string('state' ,100)->nullable();
            
            $table->string('responsible_name', 100);
            $table->string('phone', 20);
            $table->string('whatsapp', 20)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('origin_school', 100)->nullable();
            $table->string('series',50)->nullable();
            $table->string('class',50)->nullable();
            $table->date('date_of_entry')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('support')->default(true);
            $table->enum('status', ['active', 'inative', 'transfer', 'completed'])->default('active');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
