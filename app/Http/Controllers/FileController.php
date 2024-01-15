<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string
    {
        $gambar = $request->file('gambar');
        $gambar->storePubliclyAs('gambar', $gambar->getClientOriginalName(), 'public');

        return "Up sukses : " . $gambar->getClientOriginalName();
    }
}
