<?php

namespace SieParser\data;

class Balance
{
    public string $year;
    public string $account;
    public float $balance;

    public function __construct($year, $account, $balance)
    {
        $this->year = $year;
        $this->account = $account;
        $this->balance = $balance;
    }

}