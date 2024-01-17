<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormController extends Controller
{
    public function getForm(): Response
    {
        return response()
        ->view('form', ['judul' => 'Test Form']);
    }

    public function postForm(Request $request): Response
    {
        $nama = $request->input('nama');
        return response()
        ->view('hai', [
            'judul' => 'Test Form',
            'nama' => $nama
        ]);
    }
}
