<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fichero.
 * @property integer $Id
 * @property string $Url
 * @property integer $IdRecurso
 * @property Recurso $recurso
 */
class Fichero extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'ficheros';
    /**
     * @var array
     */
    protected $fillable = ['url', 'idRecurso'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurso()
    {
        return $this->belongsTo('App\Recurso', 'idRecurso', 'id');
    }
	
}
