<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Recursotags.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:51:20pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Recursotags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('recursotags',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->integer('idRecursos')->unsigned();
        
        $table->integer('idTag')->unsigned();
        
        $table->boolean('activo');
        
        /**
         * Foreignkeys section
         */

            $table->foreign('idRecursos')->references('id')->on('recursos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('idTag')->references('id')->on('tags')->onDelete('CASCADE')->onUpdate('CASCADE');


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
        Schema::drop('recursotags');
    }
}
