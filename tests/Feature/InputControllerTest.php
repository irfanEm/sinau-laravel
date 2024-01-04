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

    public function testInputNested()
    {
        $this->post('/request/input/namadepan',[
            "nama" => [
                "depan" => "Shilvia",
                "belakang" => "Qurrota"
            ]
        ])->assertSeeText('Halo Shilvia');
    }

    public function testInputAll()
    {
        $this->post('/request/input/semua',[
            "nama" => [
                "depan" => "Shilvia",
                "tengah" => "Qurrota",
                "belakang" => "Ayun"
            ]
        ])->assertSeeText('nama')
        ->assertSeeText('Shilvia')
        ->assertSeeText('tengah')
        ->assertSeeText('Qurrota')
        ->assertSeeText('belakang')
        ->assertSeeText("Ayun");
    }

    public function testInputArray()
    {
        $this->post('/request/input/array',[
            "alamat" => [
                [
                    "desa" => "Sumingkir",
                    "kecamatan" => "Jeruklegi",
                    "kabupaten" => "Cilacap"
                ],
                [
                    "desa" => "Sunyalangu",
                    "kecamatan" => "Karanglewas",
                    "kabupaten" => "Banyumas"
                ]
            ]
        ])
        ->assertSeeText('Sumingkir')
        ->assertSeeText('Sunyalangu');
    }

    public function testInputType()
    {
        $this->post('/request/input/tipe', [
            "nama" => "Shilvia Qurrota Ayun",
            "menikah" => "true",
            "tgl_lahir" => "17-03-2003"
        ])->assertSeeText('Shilvia Qurrota Ayun')->assertSeeText('true')->assertSeeText('17-03-2003');
    }
}
