<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Comentarios.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:41:27pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Comentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('comentarios',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->integer('numero');
        
        $table->String('nombre');
        
        $table->String('email');
        
        $table->String('mensaje');
        
        $table->boolean('aprobado');
        
        $table->integer('numContestado');
        
        $table->boolean('activo');
        
        $table->integer('idRecurso')->unsigned();
        
        /**
         * Foreignkeys section
         */

            $table->foreign('idRecurso')->references('id')->on('recursos')->onDelete('CASCADE')->onUpdate('CASCADE');


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
        Schema::drop('comentarios');
    }
}
