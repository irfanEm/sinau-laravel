<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function halo(Request $request): string
    {
        $nama = $request->input('nama');
        return "Halo $nama.";
    }
}
