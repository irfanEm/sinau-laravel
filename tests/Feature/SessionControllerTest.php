<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testBuatSession(){
        $this->get('/session/buat')
            ->assertSeeText('Ahsiap')
            ->assertSessionHas('User-Id', 'Balqis_FA')
            ->assertSessionHas('Is-Member', true);
    }

    public function testGetSession()
    {
        $this->withSession([
            'User-Id' => 'Balqis_FA',
            'Is-Member' => 'true'
        ])->get('/session/get')
            ->assertSeeText('User Id : Balqis_FA, member : true');
    }

    public function testGetSessionFail()
    {
        $this->withSession([])
            ->get('/session/get')
            ->assertSeeText('User Id : tamu, member : false');
    }
}
