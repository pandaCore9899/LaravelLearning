<?php

namespace App\Providers\Learning;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class MyRouteProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Route::macro('crud', function ($prefix, $controller) {
            Route::get($prefix . '/show', [$controller, 'index'])->name($prefix . '.show');
            Route::get($prefix . '/create',  [$controller, 'create'])->name($prefix . '.create');
            Route::post($prefix . '/store',  [$controller, 'store'])->name($prefix . '.store');
            Route::patch($prefix . '/update/{id}',  [$controller, 'update'])->name($prefix . '.update');
            Route::delete($prefix . '/delete/{id}',  [$controller, 'delete'])->name($prefix . '.show');
        });
        Route::macro('import', function ($prefix, $controller) {
            Route::match(
                ['get', 'post'],
                $prefix . '/import',
                [
                    $controller, 'import'
                ]
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Route $route)
    {
    }
}
