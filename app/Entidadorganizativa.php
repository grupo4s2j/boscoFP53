<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Entidadorganizativa.
 *
 * @property integer $Id
 * @property string $Nombre
 * @property string $Direccion
 * @property string $Geolocalizacion
 * @property integer $Activo
 * @property Recurso[] $recursos
 *
 * */
class Entidadorganizativa extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'entidadorganizativas';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'direccion', 'geolocalizacion', 'activo', 'email', 'telefono', 'breveDesc'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recursos()
    {
        return $this->hasMany('App\Recurso', 'idEntidadOrganizativa', 'id');
    }
}
