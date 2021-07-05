<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaValorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigna_valors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('medicamento_id');
            $table->date('fecha_asigna');
            $table->integer('valor');
            $table->integer('cantidad');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('asigna_valors');
    }
}
