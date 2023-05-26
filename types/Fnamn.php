<?php

namespace SieParser\types;

class Fnamn extends ParseType
{
    private string $flag = "#FNAMN";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array|string
    {
        // Build a string
        $companyName = "";
        for ($i = 0; $i < count($line); $i++) {
            if ($i > 0) {
                $companyName .= " " . $line[$i];
            }
        }

        return trim(str_replace("\"", "", $companyName));

    }
}