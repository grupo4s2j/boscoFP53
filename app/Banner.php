<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Banner.
 *
 * @property integer $Id
 * @property string $Img
 * @property string $Url
 * @property integer $Activo
 */
class Banner extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'banners';

    protected $fillable = ['Img', 'Url', 'Activo'];
	
	public static function getBanner(){
	 	$banners = Banner::where('activo', 1)
					->get();
	 	return $banners;
	 }
}
