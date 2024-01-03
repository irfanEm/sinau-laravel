<?php

namespace App\Http\Controllers;

use App\Services\HaloBalqisFarahId;
use Illuminate\Http\Request;

class HaiController extends Controller
{
    private HaloBalqisFarahId $haloBalqisFarahId;

    public function __construct(HaloBalqisFarahId $haloBalqisFarahId)
    {
        $this->haloBalqisFarahId = $haloBalqisFarahId;
    }

    public function Hai()
    {
        return "Hai kamu, iya kamu..";
    }

    public function HaiNama(Request $request, string $name): string
    {
        return $this->haloBalqisFarahId->HaloBalqis($name);
    }

    public function request(Request $request): string
    {
        return $request->path() . PHP_EOL.
        $request->url() . PHP_EOL.
        $request->fullUrl() . PHP_EOL.
        $request->method() . PHP_EOL.
        $request->header('Accept') . PHP_EOL;
    }
}
