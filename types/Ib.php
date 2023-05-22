<?php

namespace SieParser\types;

class Ib extends ParseType
{
    private string $flag = "#IB";

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