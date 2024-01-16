<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
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

    public function testResponseView()
    {
        $this->get('/response/view')
        ->assertSeeText('Hai, saya fulan');
    }

    public function testResponseJson()
    {
        $this->get('/response/json')
        ->assertJson([
            "nama" => [
                "depan" => "Irfan",
                "belakang" => "Machmud"
            ],
            "ttl" => "Cilacap, 27-11-97",
            "gender" => "laki-laki",
            "umur" => 26
        ]);
    }

    public function testResponseFile()
    {
        $this->get('/response/file')
        ->assertHeader('Content-Type', 'image/jpeg');
    }

    public function testResponseDownload()
    {
        $this->get('/response/download')
        ->assertDownload('gear 5.jpeg');
    }
}
