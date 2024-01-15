<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponseHello()
    {
        $this->get('/response/hallo')
        ->assertStatus(200)
        ->assertSeeText('Response Hallo..');
    }

    public function testResponseHeader()
    {
        $this->get('/response/header')
        ->assertStatus(200)
        ->assertSeeText('nama')->assertSeeText('Irfan')->assertSeeText('Machmud')
        ->assertHeader('Content-Type', 'application/json')
        ->assertHeader('Author', 'Programer Anyaran')
        ->assertHeader('Email', 'imachmud97@gmail.com')
        ->assertHeader('App', 'Sinau Laravel');
    }
}
