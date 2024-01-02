<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadeTest extends TestCase
{
    public function testFacadeConfig()
    {
        $cnfg = $this->app->make('config');
        $config3 = $cnfg->get('contoh.nama.depan');
        
        $config1 = config("contoh.nama.depan");
        $config2 = Config::get('contoh.nama.depan');

        self::assertEquals($config1, $config2, $config3);

        var_dump($cnfg->all());
    }

    public function testConfigMock()
    {
        Config::shouldReceive('get')
        ->with('contoh.nama.depan')
        ->andReturn('Halo Balqis Farah Anabila');

        $HaloBalqis = Config::get('contoh.nama.depan');
        self::assertEquals('Halo Balqis Farah Anabila', $HaloBalqis);
    }
}