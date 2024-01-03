<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HaiControllerTest extends TestCase
{
    public function testHaiController()
    {
        $this->get('/controller/hai')
        ->assertSeeText('Hai kamu, iya kamu..');

        $this->get('/controller/hai/Balqis Farah Anabila')
        ->assertSeeText('Halo Balqis Farah Anabila');
    }

    public function testRequest()
    {
        $this->get('/controller/request', ['Accept' => 'plain/text'])
        ->assertSeeText('controller/request')
        ->assertSeeText('http://localhost/controller/request')
        ->assertSeeText('http://localhost/controller/request')
        ->assertSeeText('GET')
        ->assertSeeText('plain/text');
    }
}
