<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\AssesmentsRepository::class, 
            \App\Repositories\AssesmentsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GradeRepository::class, 
            \App\Repositories\GradeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ScaleRepository::class, 
            \App\Repositories\ScaleRepositoryEloquent::class);
        //:end-bindings:
    }
}
