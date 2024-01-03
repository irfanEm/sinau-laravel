<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutingTest extends TestCase
{
    public function testRoute()
    {
        $this->get('/irfanem')
        ->assertStatus(200)
        ->assertSeeText("Hai, perkenalkan saya adalah programmer anyaran dari Cilacap.");
    }

    public function testRedirect()
    {
        $this->get('/instagram')
        ->assertRedirect('/irfanem');
    }

    public function testfallback()
    {
        $this->get('/notfound')
        ->assertSeeText('404 : Rak Ketemu !');

        $this->get('/ha')
        ->assertSeeText('404 : Rak Ketemu !');

        $this->get('/eeeeeee3')
        ->assertSeeText('404 : Rak Ketemu !');
    }

    public function testRouteParams()
    {
        $this->get('/produks/1')
        ->assertSeeText('Produk : 1.');

        $this->get('/produks/11')
        ->assertSeeText('Produk : 11.');

        $this->get('/produks/1/items/roti')
        ->assertSeeText('Produk : 1, Item : roti.');

        $this->get('/produks/1/items/susu')
        ->assertSeeText('Produk : 1, Item : susu.');
    }

    public function testRouteParametersRegex()
    {
        $this->get('/categories/211')
        ->assertSeeText('Kategori : 211.');

        $this->get('/categories/ups')
        ->assertSeeText('404 : Rak Ketemu !');
    }

    public function testRouteOptionalParam()
    {
        $this->get('/users/prganyrn')
            ->assertSeeText('Hai prganyrn');

        $this->get('/users/')
            ->assertSeeText('Hai kamu');
    }

    public function testRouteKonflik()
    {
        $this->get('/konflik/balqis')
        ->assertSeeText('Hallo balqis');

        $this->get('/konflik/irfan')
        ->assertSeeText('Hai Irfan Machmud');
    }

    public function testRouteName()
    {
        $this->get('/product/1133')
        ->assertSeeText('Link : http://localhost/produks/1133');

        $this->get('/product-redirect/1133')
        ->assertRedirect('/produks/1133');
    }
}
