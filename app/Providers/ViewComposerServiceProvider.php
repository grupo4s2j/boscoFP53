<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categoria;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeMasterFront();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    public function composeMasterFront()
    {
        view()->composer('fo.octagon_layout.octagon_master', 'App\Http\Controllers\MainPageController@index');
        
        /*view()->composer('fo.octagon_layout.octagon_master', function($view) {
            $view->with('categorias', Categoria::all());
        });*/
    }
}
