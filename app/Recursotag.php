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

    /**
     * @param $id
     * @return mixed
     */
    public static function findTagsInRecurs ($id)
    {
        $res= \DB::table('recursotags')
            ->join('tags', 'recursotags.idTag', '=', 'tags.id')
            ->select('recursotags.idTag as id',  'tags.nombre as text', 'recursotags.id as idrs')
            ->where('idRecursos','=', $id )
            ->get();

        return $res;
    }

}

