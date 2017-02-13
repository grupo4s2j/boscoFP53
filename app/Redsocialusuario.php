<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Redsocialusuario.
 *
 * @property integer $Id
 * @property integer $IdRedSocial
 * @property string $User
 * @property string $Pass
 * @property Redsocial $redsocial
 */
class Redsocialusuario extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'redsocialusuarios';

    /**
     * @var array
     */
    protected $fillable = ['idRedsocial', 'user', 'pass'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function redsocial()
    {
        return $this->belongsTo('App\Redsocial', 'idRedsocial', 'id');
    }
}
