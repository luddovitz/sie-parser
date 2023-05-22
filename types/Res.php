<?php

namespace SieParser\types;

class Res extends ParseType
{
    private string $flag = "#RES";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array
    {

        return [
            'year' => $line[1],
            'account' => $line[2],
            'balance' => $line[3],
            'quantity' => $line[4]
        ];

    }
}