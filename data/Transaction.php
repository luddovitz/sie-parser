<?php

namespace SieParser\data;

class Transaction
{
    public string $account;
    public float $amount;

    public function __construct(string $account, string $amount)
    {
        $this->account = $account;
        $this->amount = $amount;
    }

}