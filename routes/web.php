<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/dashboard', 'HomeController@index');
Route::get('tag/find', '\App\Http\Controllers\TagController@find');

Route::group(['middleware'=> 'web'],function(){
});
///////////BACKOFFICE///////////////////////
//categoria Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('categoria','\App\Http\Controllers\CategoriaController');
  Route::post('categoria/{id}/update','\App\Http\Controllers\CategoriaController@update');
  Route::get('categoria/{id}/delete','\App\Http\Controllers\CategoriaController@destroy');
  Route::get('categoria/{id}/deleteMsg','\App\Http\Controllers\CategoriaController@DeleteMsg');
});


Route::group(['middleware'=> 'web'],function(){
});


//subcategoria Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('subcategoria','\App\Http\Controllers\SubcategoriaController');
  Route::post('subcategoria/{id}/update','\App\Http\Controllers\SubcategoriaController@update');
  Route::get('subcategoria/{id}/delete','\App\Http\Controllers\SubcategoriaController@destroy');
  Route::get('subcategoria/{id}/deleteMsg','\App\Http\Controllers\SubcategoriaController@DeleteMsg');
});

//entidadorganizativa Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('entidadorganizativa','\App\Http\Controllers\EntidadorganizativaController');
  Route::post('entidadorganizativa/{id}/update','\App\Http\Controllers\EntidadorganizativaController@update');
  Route::get('entidadorganizativa/{id}/delete','\App\Http\Controllers\EntidadorganizativaController@destroy');
  Route::get('entidadorganizativa/{id}/deleteMsg','\App\Http\Controllers\EntidadorganizativaController@DeleteMsg');
});

//recurso Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('recurso','\App\Http\Controllers\RecursoController');
  Route::post('recurso/{id}/update','\App\Http\Controllers\RecursoController@update');
  Route::get('recurso/{id}/delete','\App\Http\Controllers\RecursoController@destroy');
  Route::get('recurso/{id}/deleteMsg','\App\Http\Controllers\RecursoController@DeleteMsg');
  Route::post('recurso/addSubcategoria', '\App\Http\Controllers\RecursoController@addSubcategoria');
 // Route::post('recurso/addPermission', '\App\Http\Controllers\ScaffoldInterface\UserController@addPermission');
 // Route::get('recurso/removePermission/{permission}/{user_id}', '\App\Http\Controllers\ScaffoldInterface\UserController@revokePermission');
  Route::get('recurso/removeSubcategoria/{role}/{user_id}', '\App\Http\Controllers\RecursoController@removeSubcategoria');
});


//recursossubcategoria Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('recursossubcategoria','\App\Http\Controllers\RecursossubcategoriaController');
  Route::post('recursossubcategoria/{id}/update','\App\Http\Controllers\RecursossubcategoriaController@update');
  Route::get('recursossubcategoria/{id}/delete','\App\Http\Controllers\RecursossubcategoriaController@destroy');
  Route::get('recursossubcategoria/{id}/deleteMsg','\App\Http\Controllers\RecursossubcategoriaController@DeleteMsg');
});

//fichero Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('fichero','\App\Http\Controllers\FicheroController');
  Route::post('fichero/{id}/update','\App\Http\Controllers\FicheroController@update');
  Route::get('fichero/{id}/delete','\App\Http\Controllers\FicheroController@destroy');
  Route::get('fichero/{id}/deleteMsg','\App\Http\Controllers\FicheroController@DeleteMsg');
});

//comentario Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('comentario','\App\Http\Controllers\ComentarioController');
  Route::post('comentario/{id}/update','\App\Http\Controllers\ComentarioController@update');
  Route::get('comentario/{id}/delete','\App\Http\Controllers\ComentarioController@destroy');
  Route::get('comentario/{id}/deleteMsg','\App\Http\Controllers\ComentarioController@DeleteMsg');
});

//tag Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('tag','\App\Http\Controllers\TagController');
  Route::post('tag/{id}/update','\App\Http\Controllers\TagController@update');
  Route::get('tag/{id}/delete','\App\Http\Controllers\TagController@destroy');
  Route::get('tag/{id}/deleteMsg','\App\Http\Controllers\TagController@DeleteMsg');

});

//recursotag Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('recursotag','\App\Http\Controllers\RecursotagController');
  Route::post('recursotag/{id}/update','\App\Http\Controllers\RecursotagController@update');
  Route::get('recursotag/{id}/delete','\App\Http\Controllers\RecursotagController@destroy');
  Route::get('recursotag/{id}/deleteMsg','\App\Http\Controllers\RecursotagController@DeleteMsg');
});

//banner Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('banner','\App\Http\Controllers\BannerController');
  Route::post('banner/{id}/update','\App\Http\Controllers\BannerController@update');
  Route::get('banner/{id}/delete','\App\Http\Controllers\BannerController@destroy');
  Route::get('banner/{id}/deleteMsg','\App\Http\Controllers\BannerController@DeleteMsg');
});

//evento Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('evento','\App\Http\Controllers\EventoController');
  Route::post('evento/{id}/update','\App\Http\Controllers\EventoController@update');
  Route::get('evento/{id}/delete','\App\Http\Controllers\EventoController@destroy');
  Route::get('evento/{id}/deleteMsg','\App\Http\Controllers\EventoController@DeleteMsg');
});

//redsocial Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('redsocial','\App\Http\Controllers\RedsocialController');
  Route::post('redsocial/{id}/update','\App\Http\Controllers\RedsocialController@update');
  Route::get('redsocial/{id}/delete','\App\Http\Controllers\RedsocialController@destroy');
  Route::get('redsocial/{id}/deleteMsg','\App\Http\Controllers\RedsocialController@DeleteMsg');
});

//redsocialusuario Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('redsocialusuario','\App\Http\Controllers\RedsocialusuarioController');
  Route::post('redsocialusuario/{id}/update','\App\Http\Controllers\RedsocialusuarioController@update');
  Route::get('redsocialusuario/{id}/delete','\App\Http\Controllers\RedsocialusuarioController@destroy');
  Route::get('redsocialusuario/{id}/deleteMsg','\App\Http\Controllers\RedsocialusuarioController@DeleteMsg');
});
///////////////////////////////////

////////FRONTOFFICE////////////////
//Route::get('/', function() { return view('fo.index'); });
Route::get('/', 'IndexController@index');
Route::post('/rol', 'IndexController@setCookie');
Route::group(['prefix' => '/', 'middleware'=> 'checkcookie'], function(){
    Route::get('home', 'MainPageController@indexFront');
    Route::post('rolchange', 'IndexController@changeCookie');
    //CATEGORIAS
    Route::get('categorias', 'CategoriaController@indexFront');
    //SUBCATEGORIAS
    Route::get('categorias/{id}', 'SubcategoriaController@indexFront');
    //RECURSOS
    Route::get('recursos', 'RecursoController@indexFront');
    Route::get('recursos/{id}', 'RecursoController@showRecurso');
    Route::get('recursos/categoria/{id}', 'RecursoController@getRecursoByCategoria');
    Route::get('recursos/subcategoria/{id}', 'RecursoController@getRecursoBySubcategoria');
    //SEARCH
    Route::post('search', 'TagController@search');
    Route::get('search/tag/{tag}', 'TagController@searchByTag');
    //BUSCADOR
    Route::get('find', 'TagController@find');
    //CONTACTO
    Route::get('contacto', function(){
        return view('fo.contact');
    });
    //NOSOTROS
    Route::get('nosotros', function(){
        return view('fo.about');
    });
});
//TESTIIIIIMG
Route::get('testing/{id}', 'TestingController@queries');
////////////////////////////////////
