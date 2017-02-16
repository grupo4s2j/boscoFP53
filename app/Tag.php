<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tag.
 *
 * @property integer $Id
 * @property string $Nombre
 * @property integer $Usado
 * @property Recursotag[] $recursotags
 * */
class Tag extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'tags';
    protected $logo = 'fa-hashtag';
    /**
     * @var array
     */
    protected $fillable = ['nombre', 'usado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recursotags()
    {
        return $this->hasMany('App\Recursotag', 'idTag', 'id');
    }
    
    public static function topRatedTags()
    {
        $colores = ['javascript', 'iphone', 'top-hills', 'wordpress', 'ebola-virus'];
        $tags = \DB::table('tags')->orderBy('usado', 'desc')->take(5)->get();
        $sumtags = \App\Tag::sumaTags($tags);
        //$prueba = \DB::table('tags')->selectRaw('sum(usado) as total')->groupBy('usado')->orderBy('usado', 'desc')->take(5)->get();
        //$prueba = \DB::table('tags')->select(DB::raw('sum(usado)'))->groupBy('usado')->orderBy('usado', 'desc')->take(5)->get();
        
        foreach($tags as $tag){
            $tag->color = $colores[array_rand($colores, 1)];
            $tag->porcentaje = round((100*$tag->usado)/$sumtags);
        }
        return $tags;
    }
    
    public static function sumaTags($tags)
    {
        $i = 0;
        
        foreach($tags as $tag){
            $i += $tag->usado;
        }
        return $i;
    }
}
