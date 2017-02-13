<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Banners.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:53:21pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Banners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('banners',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('img');
        
        $table->String('url');
        
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
        Schema::drop('banners');
    }
}
