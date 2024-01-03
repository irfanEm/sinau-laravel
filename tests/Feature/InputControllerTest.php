<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInputRequest()
    {
        $this->get('/request/input?nama=Balqis')
        ->assertSeeText('Halo Balqis.');

        $this->post('/request/input', [
            'nama' => 'Balqis Farah Anabila'
        ])->assertSeeText('Halo Balqis Farah Anabila');
    }
}
