<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testSetCookie()
    {
        $this->get("/cookie/set")
        ->assertSeeText('Hai Cookie')
        ->assertCookie('User-Id', 'Balqis_FA')
        ->assertCookie('Is-Member', 'true');
    }

    public function testGetCookie()
    {
        $this->withCookie('User-Id', 'Balqis_FA')
        ->withCookie('Is-Member', 'true')
        ->get('/cookie/get')
        ->assertJson([
            'User-Id' => 'Balqis_FA',
            'Is-Member' => 'true'
        ]);
    }

    public function testGetCookieTamu()
    {
        $this->withCookie('User-Id', '')
        ->withCookie('Is-Member', '')
        ->get('/cookie/get')
        ->assertJson([
            'User-Id' => '',
            'Is-Member' => ''
        ]);
    }
}
