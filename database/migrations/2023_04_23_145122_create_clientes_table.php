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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('CIF',40);
            $table->string('nombre',50);
            $table->string('provincia',50)->nullable();
            $table->string('CodigoPostal',50)->nullable();
            $table->string('poblacion',50)->nullable();
            $table->string('email',50)->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('Direccion',30)->nullable();
            $table->boolean('REQ')->nullable()->default(0.50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
