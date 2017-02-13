<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Subcategorias.
 *
 * @author  The scaffold-interface created at 2017-02-09 02:57:29pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Subcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('subcategorias',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->integer('idCategoria')->unsigned();
        
        $table->String('nombre');
        
        $table->integer('orden');
        
        $table->boolean('activo');
        
        /**
         * Foreignkeys section
         */
            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('set null')->onUpdate('CASCADE');



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
        Schema::drop('subcategorias');
    }
}
