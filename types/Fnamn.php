<?php

namespace SieParser\types;

class Fnamn extends ParseType
{
    private string $flag = "#FNAMN";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array
    {
        return [
            "companyName" => $line[1]
        ];
    }
}