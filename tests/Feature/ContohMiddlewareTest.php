<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    public function testMiddlewareContohDenied()
    {
        $this->get('/middleware/contoh')
        ->assertStatus(401)
        ->assertSeeText('Akses Dilarang');
    }

    public function testMiddlewareContohSukses()
    {
        $this->withHeader('X-API-PRGANYRN', 'Balqis_FA')
        ->get('/middleware/contoh')
        ->assertStatus(200)
        ->assertSeeText('Aman.');
    }

    public function testMiddlewareGrupDenied()
    {
        $this->get('/middleware/grup')
        ->assertStatus(401)
        ->assertSeeText('Akses Dilarang');
    }

    public function testMiddlewareGrupSukses()
    {
        $this->withHeader('X-API-PRGANYRN', 'Balqis_FA')
        ->get('/middleware/grup')
        ->assertStatus(200)
        ->assertSeeText('Grup.');
    }
}
