<?php

namespace SieParser\types;

class Orgnr extends ParseType
{
    private string $flag = "#ORGNR";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array
    {
        return [
            'orgnr' => $line[1]
        ];
    }
}