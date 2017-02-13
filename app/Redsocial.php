<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Redsocial.
 *
 * @property integer $Id
 * @property string $RedSocial
 * @property string $Link
 * @property Redsocialusuario[] $redsocialusuarios
 */
class Redsocial extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'redsocials';

    /**
     * @var array
     */
    protected $fillable = ['redSocial', 'link'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function redsocialusuarios()
    {
        return $this->hasMany('App\Redsocialusuario', 'idRedsocial', 'id');
    }
}
