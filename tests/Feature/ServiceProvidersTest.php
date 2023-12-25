<?php

namespace Tests\Feature;

use App\Data\Farah;
use Tests\TestCase;
use App\Data\Balqis;
use App\Data\Anabila;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceProvidersTest extends TestCase
{
    public function testServiceProviders()
    {
        $balqis = $this->app->make(Balqis::class);
        $farah = $this->app->make(Farah::class);
        $anabila = $this->app->make(Anabila::class);

        self::assertSame($balqis, $farah->balqis);
        self::assertSame($balqis, $anabila->balqis);
        self::assertSame($farah, $anabila->farah);
    }
}
