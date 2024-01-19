<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function buatSession(Request $request): string
    {
        $request->session()->put('User-Id', 'Balqis_FA');
        $request->session()->put('Is-Member', true);
        return "Ahsiap";
    }

    public function getSession(Request $request): string
    {
        $userId = $request->session()->get('User-Id', 'tamu');
        $isMember = $request->session()->get('Is-Member', 'false');

        return "User Id : ${userId}, member : ${isMember}";
    }
}
