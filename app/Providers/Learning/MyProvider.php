<?php

namespace App\Providers\Learning;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;


class MyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('pathContain', function($value){
            $path = $this->path();
            dump($this->root());
            return Str::contains($path, $value);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
       
    }
}
