<?php

namespace SieParser\data;

class Transaction
{
    public string $kontonr;
    public string $belopp;

    public function __construct(string $kontonr, string $belopp)
    {
        $this->kontonr = $kontonr;
        $this->belopp = $belopp;
    }

}