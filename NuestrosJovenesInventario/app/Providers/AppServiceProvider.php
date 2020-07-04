<?php

namespace App\Providers;

use App\Opcion;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FacadesView::composer('layouts.private', function ($view) {
            $menus = Opcion::traerOpcionesPorRol();
            $view->with('menuLista', $menus);
        });
    }
}
