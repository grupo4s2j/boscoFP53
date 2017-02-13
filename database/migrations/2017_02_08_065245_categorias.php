<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Categorias.
 *
 * @author  The scaffold-interface created at 2017-02-08 06:52:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Categorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('categorias',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nombre');
        
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
        Schema::drop('categorias');
    }
}
