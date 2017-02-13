<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Recursos.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:07:09pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('recursos',function (Blueprint $table){

        $table->increments('id')->unsigned();
        
        $table->String('titulo');
        
        $table->String('descripcion');
        
        $table->String('contenido');
        
        $table->String('img');
        
        $table->date('fechaPost');
        
        $table->date('fechaInicio');
        
        $table->date('fechaFin');
        
        $table->String('rangoEdad');
        
        $table->String('relevancia');
        
        $table->integer('idEntidadOrganizativa')->unsigned();
        
        $table->boolean('activo');
        
        /**
         * Foreignkeys section
         */
            $table->foreign('idEntidadOrganizativa')->references('id')->on('entidadorganizativas')->onDelete('set null')->onUpdate('CASCADE');



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
        Schema::drop('recursos');
    }
}
