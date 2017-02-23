<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subcategoria.
 *
 * @property integer $Id
 * @property integer $IdCategoria
 * @property string $Nombre
 * @property integer $Orden
 * @property integer $Activo
 * @property Categoria $categoria
 * @property Recursosubcategorium[] $recursosubcategorias
 */
class Subcategoria extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'subcategorias';

    /**
     * @var array
     */
    protected $fillable = ['idCategoria', 'nombre', 'img', 'orden', 'activo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'idCategoria', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recursosubcategorias()
    {
        return $this->hasMany('App\Recursosubcategorium', 'idSubCategoria', 'id');
    }
}
