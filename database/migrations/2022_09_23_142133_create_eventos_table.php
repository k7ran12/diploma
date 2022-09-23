<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_diplomas')->default(1);
            $table->string('imagen_diploma_1')->nullable();
            $table->string('imagen_diploma_2')->nullable();
            $table->string('imagen_diploma_3')->nullable();
            $table->integer('contacto_diploma_1')->nullable();
            $table->integer('contacto_diploma_2')->nullable();
            $table->integer('contacto_diploma_3')->nullable();
            $table->text('descripcion_actividad')->nullable();
            $table->boolean('estado')->nullable();
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
        Schema::dropIfExists('eventos');
    }
};
