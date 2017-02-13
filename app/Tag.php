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
	
}
