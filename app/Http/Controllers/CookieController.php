<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function setCookie(Request $request): Response
    {
        return response('Hai Cookie')
        ->cookie('User-Id', 'Balqis_FA', 1000, '/')
        ->cookie('Is-Member', 'true', 1000, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()
        ->json([
            'User-Id' => $request->cookie('User-Id', 'tamu'),
            'Is-Member' => $request->cookie('Is-Member', 'false')
        ]);
    }

    public function clearCookie()
    {
        return response('Hapus Cookie')
        ->withoutCookie('User-Id')
        ->withoutCookie('Is-Member');
    }
}
