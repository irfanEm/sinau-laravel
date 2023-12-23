<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $namaDepan = config("contoh.nama.depan");
        $namaBelakang = config("contoh.nama.belakang");
        $email = config("contoh.email");
        $ig = config("contoh.instagram");
        $tiktok = config("contoh.tiktok");

        self::assertEquals("Irfan", $namaDepan);
        self::assertEquals("Machmud", $namaBelakang);
        self::assertEquals("imachmud97@gmail.com", $email);
        self::assertEquals("https://www.instagram.com/irfan.em", $ig);
        self::assertEquals("https://www.tiktok.com/@i_em27", $tiktok);
    }
}
