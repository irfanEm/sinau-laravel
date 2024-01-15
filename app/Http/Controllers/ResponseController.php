<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(): Response
    {
        return response("Response Hallo..");
    }

    public function header(): Response
    {
        $body = [
            "nama" => [
                "depan" => "Irfan",
                "belakang" => "Machmud"
            ],
            "ttl" => "Cilacap, 27-11-97",
            "gender" => "laki-laki",
            "umur" => 26
        ];

        return response(json_encode($body), 200)
        ->header('Content-Type', 'application/json')
        ->withHeaders([
            "Author" => "Programer Anyaran",
            "Email" => "imachmud97@gmail.com",
            "App" => "Sinau Laravel"
        ]);
    }

    public function responseView(): Response
    {
        return response()
        ->view('hai', ['judul'=>'Hai PHP', 'nama'=>'fulan']);
    }

    public function responseJson(): JsonResponse
    {
        $body = [
            "nama" => [
                "depan" => "Irfan",
                "belakang" => "Machmud"
            ],
            "ttl" => "Cilacap, 27-11-97",
            "gender" => "laki-laki",
            "umur" => 26
        ];

        return response()
        ->json($body);
    }

    public function responseFile(): BinaryFileResponse
    {
        return response()
        ->file(storage_path('app/public/gambar/gear 5.jpeg'));
    }

    public function responseFileDownload(): BinaryFileResponse
    {
        return response()
        ->download(storage_path('app/public/gambar/gear 5.jpeg'));
    }
}
