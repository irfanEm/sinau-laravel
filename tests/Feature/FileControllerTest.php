<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    public function testUploadFile()
    {
        $gambar = UploadedFile::fake()->image('balqis.jpg');
        $this->post('/file/upload', [
            'gambar' => $gambar
        ])->assertSeeText('Up sukses : balqis.jpg');
    }
}
