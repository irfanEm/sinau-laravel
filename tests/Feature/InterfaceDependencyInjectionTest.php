<?php

namespace Tests\Feature;

use App\Services\BalqisFarahInterface;
use App\Services\HaloBalqisFarahId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InterfaceDependencyInjectionTest extends TestCase
{
    public function testDependencyInjectionInterface()
    {
        $this->app->singleton(BalqisFarahInterface::class, HaloBalqisFarahId::class);

        $haloBalqis = $this->app->make(HaloBalqisFarahId::class);
        self::assertEquals("Halo Balqis Farah Anabila", $haloBalqis->HaloBalqis("Balqis Farah Anabila"));
    }
}
