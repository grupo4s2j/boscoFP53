<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recurso.
 *
 * @property integer $Id
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Contenido
 * @property string $Img
 * @property string $FechaPost
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property string $RangoEdad
 * @property integer $Relevancia
 * @property integer $IdEntidadOrganizativa
 * @property integer $Activo
 * @property Entidadorganizativa $entidadorganizativa
 * @property Comentario[] $comentarios
 * @property Fichero[] $ficheros
 * @property Recursosubcategorium[] $recursosubcategorias
 * @property Recursotag[] $recursotags
*/
class Recurso extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'recursos';

    /**
     * @var array
     */
    protected $fillable = ['titulo', 'descripcion', 'contenido', 'img', 'fechaPost', 'fechaInicio', 'fechaFin', 'rangoEdad', 'relevancia', 'idEntidadOrganizativa', 'activo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entidadorganizativa()
    {
        return $this->belongsTo('App\Entidadorganizativa', 'idEntidadOrganizativa', 'Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'idRecurso', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ficheros()
    {
        return $this->hasMany('App\Fichero', 'idRecurso', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recursosubcategorias()
    {
       return $this->hasMany('App\Recursossubcategoria', 'idRecursos', 'id');
    }

    public function subcategorias()
    {
        return $this->belongsToMany('App\Subcategoria','recursossubcategorias','idRecursos','idSubcategorias' )->orderBy('nombre', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recursotags()
    {
        return $this->hasMany('App\Recursotag', 'idRecursos', 'id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'recursotags', 'idRecursos', 'idTag');
    }
    
    /**
     * Formatea la fecha para que se muestre como queremos
     *
     * @return  $recurso->fecha
     */
    public static function formatFecha($fechaPosteo)
    {
        $fecha = explode('-', $fechaPosteo);
        switch($fecha[1]){
            case '01' : $fecha[1] = 'January';break;
            case '02' : $fecha[1] = 'February';break;
            case '03' : $fecha[1] = 'March';break;
            case '04' : $fecha[1] = 'April';break;
            case '05' : $fecha[1] = 'May';break;
            case '06' : $fecha[1] = 'June';break;
            case '07' : $fecha[1] = 'July';break;
            case '08' : $fecha[1] = 'August';break;
            case '09' : $fecha[1] = 'September';break;
            case '10' : $fecha[1] = 'October';break;
            case '11' : $fecha[1] = 'November';break;
            case '12' : $fecha[1] = 'December';break;
        }
        return $fechaFormat = $fecha[1] . ' ' . $fecha[2] . ', ' . $fecha[0];
    }
}
