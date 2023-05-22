<?php

namespace SieParser\types;

class Rar extends ParseType
{
    private string $flag = "#RAR";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array
    {
        return [
            'year' => $line[1],
            'start' => $line[2],
            'end' => $line[3],
        ];
    }
}