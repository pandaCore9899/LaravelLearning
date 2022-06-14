<?php

namespace App\Providers;

use App\Http\Controllers\LaravelLearning\ChildClass;
use App\Http\Controllers\LaravelLearning\ChildOfChild;
use App\Http\Controllers\LaravelLearning\ServiceContainerController;
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
        $this->app->bind(ChildClass::class, function($app){
            return new ChildClass('Hoang Do');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
