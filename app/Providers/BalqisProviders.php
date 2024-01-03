<?php

namespace App\Providers;

use App\Data\Anabila;
use App\Data\Farah;
use App\Data\Balqis;
use App\Services\BalqisFarahInterface;
use App\Services\HaloBalqisFarahId;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BalqisProviders extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        BalqisFarahInterface::class => HaloBalqisFarahId::class
    ];

    public function register()
    {
        // echo "Balqis Farah Anabila Providers";
    
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

    public function provides()
    {
        return [BalqisFarahInterface::class, Balqis::class, Farah::class, Anabila::class];
    }
}
