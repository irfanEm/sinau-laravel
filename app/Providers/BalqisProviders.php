<?php

namespace App\Providers;

use App\Data\Anabila;
use App\Data\Farah;
use App\Data\Balqis;
use Illuminate\Support\ServiceProvider;

class BalqisProviders extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Balqis::class, function($app){
            return new Balqis();
        });

        $this->app->singleton(Farah::class, function($app){
            return new Farah($app->make(Balqis::class));
        });

        $this->app->singleton(Anabila::class, function($app){
            $balqis = $app->make(Balqis::class);
            $farah = $app->make(Farah::class);
            return new Anabila($balqis, $farah);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
