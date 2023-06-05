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
        Schema::create('emisors', function (Blueprint $table) {
            $table->id();
            $table->string('CIF',40)->unique();
            $table->string('nombre',50);
            $table->string('provincia',50)->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('Direccion',30)->nullable();
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emisors');
    }
};
