<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Recursossubcategorias.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:31:25pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Recursossubcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('recursossubcategorias',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->integer('idRecursos')->unsigned();
        
        $table->integer('idSubcategorias')->unsigned();
        
        /**
         * Foreignkeys section
         */

            $table->foreign('idRecursos')->references('id')->on('recursos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('idSubcategorias')->references('id')->on('subcategorias')->onDelete('CASCADE')->onUpdate('CASCADE');


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
        Schema::drop('recursossubcategorias');
    }
}
