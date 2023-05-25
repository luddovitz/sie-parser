<?php

namespace SieParser\data;

class Account
{
    public string $number;
    public string $name;

    public function __construct(string $number, string $name)
    {
        $this->number = $number;
        $this->name = $name;
    }

}