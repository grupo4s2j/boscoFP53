<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comentario.
 *
 *  @property integer $Id
 * @property string $Nombre
 * @property string $Color
 * @property string $Img
 * @property integer $Orden
 * @property integer $Activo
 * @property Subcategoria[] $subcategorias
 */
class Comentario extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'comentarios';
    /**ss
     * @var array
     */
    protected $fillable = ['numero', 'nombre', 'email', 'mensaje', 'aprobado', 'nmContestado', 'activo', 'idRecurso'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurso()
    {
        return $this->belongsTo('App\Recurso', 'idRecurso', 'id');
    }
	
}
