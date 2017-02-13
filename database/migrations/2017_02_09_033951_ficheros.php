<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Ficheros.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:39:51pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ficheros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('ficheros',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->String('url');
        
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
        Schema::drop('ficheros');
    }
}
