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
        $this->serie = preg_replace("/[^a-zA-Z0-9]+/", "", $serie);
        $this->vernr = preg_replace("/[^a-zA-Z0-9]+/", "", $vernr);
        $this->verdatum = $verdatum;
        $this->vertext = iconv('CP437', 'UTF-8', $vertext);
        $this->vertext = preg_replace("/[^a-zA-Z0-9\s]+/", "", $this->vertext);
    }

}