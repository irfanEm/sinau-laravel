<?php

namespace Tests\Feature;

use App\Data\Anabila;
use App\Data\Balqis;
use App\Data\Farah;
use App\Data\NamaLengkap;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testServiceContainer()
    {
        $balqis = $this->app->make(Balqis::class);
        $balqis2 = $this->app->make(Balqis::class);

        self::assertEquals('Balqis', $balqis->balqis());
        self::assertEquals('Balqis', $balqis2->balqis());
        self::assertNotSame($balqis, $balqis2);
    }

    public function testBind()
    {
        $this->app->bind(NamaLengkap::class, function ($app){
            return new NamaLengkap("Balqis Farah", " Anabila");
        });

        $nama = $this->app->make(NamaLengkap::class);
        $nama1 = $this->app->make(NamaLengkap::class);

        self::assertEquals('Balqis Farah', $nama->namaDepan);
        self::assertEquals('Balqis Farah', $nama1->namaDepan);
        self::assertNotSame($nama, $nama1);
    }

    public function testSingleTon()
    {
        $this->app->singleton(NamaLengkap::class, function ($app){
            return new NamaLengkap("Balqis Farah", " Anabila");
        });

        $nama = $this->app->make(NamaLengkap::class);
        $nama1 = $this->app->make(NamaLengkap::class);

        self::assertEquals('Balqis Farah', $nama->namaDepan);
        self::assertEquals('Balqis Farah', $nama1->namaDepan);
        self::assertSame($nama, $nama1);
    }

    public function testInstance()
    {
        $namaLengkap = new NamaLengkap("Balqis Farah", "Anabila");
        $this->app->instance(NamaLengkap::class, $namaLengkap);

        $nama = $this->app->make(NamaLengkap::class);
        $nama1 = $this->app->make(NamaLengkap::class);

        self::assertEquals('Balqis Farah', $nama->namaDepan);
        self::assertEquals('Balqis Farah', $nama1->namaDepan);
        self::assertSame($nama, $nama1);
    }

    public function testDependencyInjection()
    {
        $this->app->singleton(Balqis::class, function($app){
            return new Balqis();
        });


        $this->app->singleton(Farah::class, function($app){
            return new Farah($app->make(Balqis::class));
        });

        $balqis = $this->app->make(Balqis::class);
        $farah = $this->app->make(Farah::class);
        $anabila = $this->app->make(Anabila::class);

        self::assertSame($balqis, $farah->balqis);
        self::assertSame($balqis, $anabila->balqis);
        self::assertSame($farah, $anabila->farah);
    }
}
