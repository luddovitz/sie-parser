<?php

namespace SieParser\types;

class Konto extends ParseType
{
    private string $flag = "#KONTO";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): array
    {
        $accountDesc = '';
        $accountNumber = 0;

        for ($i = 0; $i < count($line); $i++) {
            $accountNumber = $line[1];
            if ($i > 1) {
                $accountDesc .= $line[$i] . " " ;
            }
        }

        $accountDesc = str_replace('"', '', $accountDesc);
        $accountDesc = trim($accountDesc);
        $accountDesc = iconv('CP437', 'UTF-8', $accountDesc);

        return [
            'number' => $accountNumber,
            'description' => $accountDesc
            ];

    }
}