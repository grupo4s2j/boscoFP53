<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento.
 *
 * @property integer $Id
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Img
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property integer $Activo
 */
class Evento extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'eventos';

    /**
     * @var array
     */
    protected $fillable = ['titulo', 'descripcion', 'img', 'fechaInicio', 'fechaFin', 'activo'];

}
