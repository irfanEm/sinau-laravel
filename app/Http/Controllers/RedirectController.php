<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "Redirect To" . PHP_EOL;
    }

    public function redirectFrom(): RedirectResponse
    {
        return redirect('/redirect/to');
    }

    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect.hai', ['nama' => 'Balqis_FA']);
    }

    public function redirectHai(string $nama): string
    {
        return "Hai kamu, $nama" . PHP_EOL;
    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([RedirectController::class, 'redirectHai'], ['nama' => 'Balqis_FA']);
    }

    public function redirectAway(): RedirectResponse
    {
        return redirect()->away('https://instagram.com/irfan.em');
    }
}
