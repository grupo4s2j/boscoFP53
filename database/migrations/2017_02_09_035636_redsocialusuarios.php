<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Redsocialusuarios.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:56:36pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Redsocialusuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('redsocialusuarios',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->integer('idRedsocial')->unsigned();
        
        $table->String('user');
        
        $table->String('pass');
        
        /**
         * Foreignkeys section
         */
            $table->foreign('idRedsocial')->references('id')->on('redsocials')->onDelete('CASCADE')->onUpdate('CASCADE');



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
        Schema::drop('redsocialusuarios');
    }
}
