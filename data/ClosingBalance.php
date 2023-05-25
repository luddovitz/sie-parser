<?php

namespace SieParser\data;

class ClosingBalance
{
    public string $year;
    public string $account;
    public string $balance;
    public string $quantity;

    public function __construct($year, $account, $balance, $quantity)
    {
        $this->year = $year;
        $this->account = $account;
        $this->balance = $balance;
        $this->quantity = $quantity;
    }
}