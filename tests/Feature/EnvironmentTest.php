<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use PharIo\Manifest\ApplicationName;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // tese nyong

    public function testEnv()
    {
        $appName = env("APP_NAME");     // contoh mengambil environment variabel dari file .env
        $ytube = env("YOUTUBE", "Programer Anyaran");   // contoh menggunakan default value pada .env
        $author = Env::get("AUTHOR");    // contoh mengambil variabel env manggunakan class Env::get()

        self::assertEquals("Sinau Laravel", $appName);
        self::assertEquals("Programer Anyaran", $ytube);
        self::assertEquals("irfanem", $author);
    }
}
