<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestRedirectController extends TestCase
{
    public function testRedirect()
    {
        $this->get('/redirect/from')
        ->assertRedirect('/redirect/to');
    }

    public function testRedirectRoute()
    {
        $this->get('/redirect/nama')
        ->assertRedirect('/redirect/hai/Balqis_FA');
    }

    public function testRedirectAction()
    {
        $this->get('/redirect/action')
        ->assertRedirect('/redirect/hai/Balqis_FA');
    }

    public function testRedirectAway()
    {
        $this->get('/redirect/away')
        ->assertRedirect('https://instagram.com/irfan.em');
    }
}
