<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testViewTentang()
    {
        $this->view('tentang.kulo', [
            'judul' => 'Tentang kulo',
            'nama' => 'Programer Anyaran'
        ])
        ->assertSeeText('Tentang kulo')
        ->assertSeeText('Hai, saya Programer Anyaran');
    }
}
