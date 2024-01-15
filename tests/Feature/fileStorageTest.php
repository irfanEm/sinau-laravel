<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class fileStorageTest extends TestCase
{
    public function testFileStorage()
    {
        $fileSystem = Storage::disk("local");
        $fileSystem->put("file.txt", "Halo Balqis Farah.");
        $content = $fileSystem->get("file.txt");
        self::assertEquals("Halo Balqis Farah.", $content);
    }

    public function testFilePublic()
    {
        $fileSystem = Storage::disk("public");
        $fileSystem->put("file.txt", "Halo Balqis Farah Public.");
        $content = $fileSystem->get("file.txt");
        self::assertEquals("Halo Balqis Farah Public.", $content);
    }
}
