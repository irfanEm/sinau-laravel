<?php

namespace Tests\Feature;

use App\Data\Anabila;
use App\Data\Balqis;
use App\Data\Farah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependenciesInjectionTest extends TestCase
{
    public function testDependenciesInjection()
    {
        $balqis = new Balqis();
        $farah = new Farah($balqis);
        $anabila = new Anabila($balqis, $farah);

        self::assertEquals($anabila->anabila(), "Balqis Farah Anabila");
        self::assertEquals($farah->farah(), "Balqis Farah");
        self::assertEquals($balqis->balqis(), "Balqis");
    }
}
