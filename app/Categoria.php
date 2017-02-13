<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria.
 *
 *  @property integer $Id
 * @property string $Nombre
 * @property string $Color
 * @property string $Img
 * @property integer $Orden
 * @property integer $Activo
 * @property Subcategoria[] $subcategorias
 */
class Categoria extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'categorias';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'color', 'img', 'orden', 'activo','logo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategorias()
    {
        return $this->hasMany('App\Subcategoria', 'idCategoria', 'id');
    }
}
