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
        Schema::create('detalle__facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio');
            //Clave ajena  producto
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            //Clave ajena factura
            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')->references('id')->on('facturas');




           // $table->unsignedBigInteger('ejercicio_fact');
           // $table->string('serie_fact',5);
           // $table->unsignedBigInteger('numero_fact');
           // $table->foreign(['ejercicio_fact', 'serie_fact','numero_fact'])
          //  ->references(['ejercicio','serie','numero'])
           // ->on('facturas')
          //  ->onDelete('cascade')
          //  ->onUpdate('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__facturas');
    }
};
