<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Tags.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:50:02pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Tags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('tags',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('nombre');
        
        $table->integer('usado');
        
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
        Schema::drop('tags');
    }
}
