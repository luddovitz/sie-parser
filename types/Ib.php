<?php

namespace SieParser\types;

use SieParser\data\Balance;

class Ib extends ParseType
{
    private string $flag = "#IB";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): Balance
    {
        return new Balance($line[1], $line[2], $line[3]);
    }
}