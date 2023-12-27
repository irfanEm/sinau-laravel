<?php

declare(strict_types=1);

namespace App\Data;

class Anabila
{
    public Balqis $balqis;
    public Farah $farah;

    public function __construct(Balqis $balqis, Farah $farah)
    {
        $this->balqis = $balqis;
        $this->farah = $farah;
    }

    public function anabila(): string
    {
        return $this->farah->farah() . " Anabila";
    }
}
