<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testUrlGeneration()
    {
        $this->get('/url/current?nama=Balqis')
        ->assertSeeText('/url/current?nama=Balqis');
    }

    public function testURLRoute()
    {
        $this->get('/url/named')
            ->assertSeeText('/hai/Balqis_FA');
    }

    public function testURLAction()
    {
        $this->get('/url/action')
            ->assertSeeText('/form');
    }
}
