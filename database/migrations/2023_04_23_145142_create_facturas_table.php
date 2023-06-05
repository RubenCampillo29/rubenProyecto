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
        Schema::create('facturas', function (Blueprint $table) {

            //$table->id()->integer()->autoIncrement('id'); //Cuando vuelva a migrar debo de provar con in id
            
            $table->unsignedBigInteger('ejercicio');
            $table->string('serie',4);
            $table->unsignedBigInteger('numero')->unique(); 
            $table->date('fecha_emision');
            $table->integer('IVA');
            $table->float('REQ');
            $table->text('Observaciones');
            $table->boolean('enviada');
            $table->string('Emisor')->nullable();
            //Relacion clave cliente.
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null'); //En algun momento poner cascade
            //Clave ajena Usuario.
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            //Clave primaria.
            $table->primary(['ejercicio', 'serie', 'numero'], 'ref_factura');
            $table->timestamps();
            //Clave ajena emisor
            $table->unsignedBigInteger('emisor_id')->nullable();
            $table->foreign('emisor_id')->references('id')->on('emisors')->onDelete('set null');
            



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
