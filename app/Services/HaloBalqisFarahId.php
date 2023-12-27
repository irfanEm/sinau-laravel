<?php

namespace App\Services;

class HaloBalqisFarahId implements BalqisFarahInterface
{
    public function HaloBalqis(string $nama): string
    {
        return "Halo $nama";
    }
}
