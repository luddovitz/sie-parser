<?php

namespace SieParser\types;

use SieParser\data\Balance;

class Ub extends ParseType
{
    private string $flag = "#UB";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): Balance
    {
        return new Balance($line[1], $line[2], $line[3], $line[4]);
    }
}