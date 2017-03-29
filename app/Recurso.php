<?php

namespace App;

use Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recurso.
 *
 * @property integer $Id
 * @property string $TituloS
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
    protected $fillable = ['titulo', 'descripcion', 'contenido', 'img', 'fechaPost', 'fechaInicio', 'fechaFin', 'rangoEdad', 'relevancia', 'idEntidadOrganizativa', 'activo', 'rol'];

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

    public static function getTopPosts($rol){
        $completed = false;
        $recursosTOP = array();
        $datetimenow = (new \DateTime());
        $datetimethen = (new \DateTime());
        $intervalo = new \DateInterval('P1M');
        while (!$completed) {
            $recursos = Recurso::where('activo', 1)
                        ->whereDate('fechaPost','<=',$datetimenow)
                        ->whereDate('fechaPost','>',$datetimethen->sub($intervalo))
                        ->where(function ($query) use ($rol) {
                            $query->where('rol', '=', 0)
                                  ->orWhere('rol', '=', $rol);
                        })
                        ->orderBy('relevancia','desc')
                        ->orderBy('fechaPost','desc')
                        ->get();
            foreach($recursos as $recurso){
                array_push($recursosTOP, $recurso);
                if(count($recursosTOP) == 10){
                    $completed = true;
                    break;
                } 
            }
            $datetimenow->sub($intervalo);
        }
    }
}