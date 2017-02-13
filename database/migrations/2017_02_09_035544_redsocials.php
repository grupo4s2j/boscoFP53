<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Redsocials.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:55:44pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Redsocials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('redsocials',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('redSocial');
        
        $table->String('link');
        
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
        Schema::drop('redsocials');
    }
}
