<?php

namespace SieParser\types;

use SieParser\data\ClosingBalance;

class Ib extends ParseType
{
    private string $flag = "#IB";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): ClosingBalance
    {
        return new ClosingBalance($line[1], $line[2], $line[3], $line[4]);
    }
}