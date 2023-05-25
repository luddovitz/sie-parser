<?php

namespace SieParser\types;
use SieParser\data\Account;

class Konto extends ParseType
{
    private string $flag = "#KONTO";

    function getFlag(): string
    {
        return $this->flag;
    }

    function parse(array $line): Account
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

        return new Account($accountNumber, $accountDesc);

    }
}