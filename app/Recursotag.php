<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recursotag.
 *
 * @property integer $Id
 * @property integer $IdRecurso
 * @property integer $IdTag
 * @property integer $Activo
 * @property Recurso $recurso
 * @property Tag $tag
  */
class Recursotag extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'recursotags';

    /**
     * @var array
     */
    protected $fillable = ['idRecurso', 'idTag', 'activo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurso()
    {
        return $this->belongsTo('App\Recurso', 'idRecurso', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag', 'idTag', 'id');
    }
}
