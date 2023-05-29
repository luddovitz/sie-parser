<?php

namespace SieParser\types;

use SieParser\data\Balance;

class Res extends ParseType
{
    private string $flag = "#RES";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): Balance
    {
        return new Balance($line[1], $line[2], $line[3]);
    }
}