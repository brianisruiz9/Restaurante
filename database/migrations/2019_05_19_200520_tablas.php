<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ingrediente');
        Schema::create('ingrediente', function(Blueprint $table) {
            $table->increments('codigo');
            $table->char('nombre', 50);
            $table->char('proveedor', 50);
            $table->timestamps();
        });

        Schema::dropIfExists('plato');
        Schema::create('plato', function(Blueprint $table) {
            $table->increments('codigo');
            $table->char('nombre', 50);
            $table->float('valor',8,2);
            $table->timestamps();
        });

        Schema::dropIfExists('platoIngrediente');
        Schema::create('platoIngrediente', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('codPlato');
            $table->unsignedInteger('codIngrediente');
            $table->float('cantidad',8,2);
            $table->foreign('codPlato')->references('codigo')->on('plato');
            $table->foreign('codIngrediente')->references('codigo')->on('ingrediente');
            $table->timestamps();
        });

        Schema::dropIfExists('orden');
        Schema::create('orden', function(Blueprint $table) {
            $table->increments('numero');
            $table->date('fecha');
            $table->unsignedInteger('NumMesa');
            $table->char('estado',1);
            $table->timestamps();
        });

        Schema::dropIfExists('ordenPlato');
        Schema::create('ordenPlato', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numOrden');
            $table->unsignedInteger('codPlato');
            $table->unsignedInteger('cantidad');
            $table->float('valor',8,2);
            $table->foreign('codPlato')->references('codigo')->on('plato');
            $table->foreign('numOrden')->references('numero')->on('orden');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingrediente');
        Schema::dropIfExists('plato');
        Schema::dropIfExists('platoIngrediente');
        Schema::dropIfExists('orden');
        Schema::dropIfExists('ordenPlato');
    }
}
