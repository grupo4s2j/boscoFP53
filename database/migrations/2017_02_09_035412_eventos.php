<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Eventos.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:54:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Eventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('eventos',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('titulo');
        
        $table->String('descripcion');
        
        $table->String('img');
        
        $table->date('fechaInicio');
        
        $table->date('fechaFin');
        
        $table->boolean('activo');
        
        /**
         * Foreignkeys section
         */
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
