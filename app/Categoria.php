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
 * @property string $Logo
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
    protected $fillable = ['nombre', 'color', 'img', 'logo', 'orden', 'activo','logo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategorias()
    {
        return $this->hasMany('App\Subcategoria', 'idCategoria', 'id');
    }
    
    public function colorCSS(){
        switch ($this->color){
            case 'Rojo': $this->color = 'life-style';break;
            case 'Verde': $this->color = 'travel';break;
            case 'Azul': $this->color = 'coding';break;
            case 'Naranja': $this->color = 'music';break;
            case 'Azulito': $this->color = 'sports';break;
            case 'Lila': $this->color = 'design';break;
            case 'Amarillo': $this->color = 'mobile';break;
            case 'Rosa': $this->color = 'health';break;
        }
    }
}
