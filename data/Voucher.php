<?php

namespace SieParser\data;

class Voucher
{
    public string $serie;
    public string $vernr;
    public string $verdatum;
    public string $vertext;
    public array $trans;

    public function __construct(string $serie, string $vernr, string $verdatum, string $vertext)
    {
        $this->serie = $serie;
        $this->vernr = $vernr;
        $this->verdatum = $verdatum;
        $this->vertext = iconv('CP437', 'UTF-8', $vertext);
    }

}