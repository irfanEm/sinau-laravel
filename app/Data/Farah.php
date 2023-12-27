<?php

declare(strict_types=1);

namespace App\Data;

use App\Data\Balqis;

class Farah
{
    public Balqis $balqis;

    public function __construct(Balqis $balqis)
    {
        $this->balqis = $balqis;
    }

    public function farah(): string
    {
        return $this->balqis->balqis() . " Farah";
    }
}
