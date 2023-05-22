<?php

namespace SieParser;

use SieParser\types\Fnamn;
use SieParser\types\Ib;
use SieParser\types\Konto;
use SieParser\types\Orgnr;
use SieParser\types\ParseType;
use SieParser\types\Rar;
use SieParser\types\Res;
use SieParser\types\Ub;

class Parser
{
    public ParsedDocument $parsedDocument;
    private \SplFileObject $file;

    public function __construct($file)
    {
        $this->parsedDocument = new ParsedDocument();
        $this->file = new \SplFileObject($file);

        // parse konto
        $this->parsedDocument->konto = $this->parse(new Konto());

        // parse res
        $this->parsedDocument->res = $this->parse(new Res());

        // parse ub
        $this->parsedDocument->ub = $this->parse(new Ub());

        // parse ib
        $this->parsedDocument->ib = $this->parse(new Ib());

        // parse years
        $this->parsedDocument->rar = $this->parse(new Rar());

        // parse company name
        $this->parsedDocument->fnamn = $this->parse(new Fnamn());

        // parse organization number
        $this->parsedDocument->orgnr = $this->parse(new Orgnr());

    }

    function parse(ParseType $parseType): array {

        $parseResult = [];

        $this->file->setFlags(\SplFileObject::DROP_NEW_LINE);
        while(!$this->file->eof()) {
            if (str_contains($this->file->fgets(), $parseType->getFlag())) {
                $line = explode(" ", $this->file->current());
                $parseResult[] = $parseType->parse($line);
            }
        }

        $this->file->rewind();

        return $parseResult;
    }

}