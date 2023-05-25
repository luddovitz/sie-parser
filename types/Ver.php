<?php

namespace SieParser\types;

class Ver extends ParseType
{
    private string $flag = "#VER";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array {
        return [];
    }
}