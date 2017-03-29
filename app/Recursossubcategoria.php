<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recursossubcategoria.
 *
 * @property integer $Id
 * @property integer $IdRecursos
 * @property integer $IdSubCategorias
 * @property Recurso $recurso
 * @property Subcategoria $subcategoria
 */
class Recursossubcategoria extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'recursossubcategorias';
    /**
     * @var array
     */
    protected $fillable = ['idRecursos', 'idSubcategorias'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurso()
    {
        return $this->belongsTo('App\Recurso', 'idRecursos', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria', 'idSubcategorias', 'id');
    }
	
}
