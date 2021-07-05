<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuscasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buscas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('medicamento_id');
            $table->date('fecha_busqueda');

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buscas');
    }
}
