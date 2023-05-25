<?php

namespace SieParser;

use Exception;
use SieParser\data\Transaction;
use SieParser\data\Voucher;
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
    private \SplFileObject $file;

    /**
     * @throws Exception
     */
    public function __construct($file)
    {
        $this->file = new \SplFileObject($file);
        if (!$this->validateFile()) {
            throw new Exception('Not a valid SIE file.');
        }
    }

    public function getOrgnr(): array
    {
        return $this->parse(new Orgnr());
    }

    public function getFnamn(): array
    {
        return $this->parse(new Fnamn());
    }

    public function getRar(): array
    {
        return $this->parse(new Rar());
    }

    public function getIb(): array
    {
        return $this->parse(new Ib());
    }

    public function getUb(): array
    {
        return $this->parse(new Ub());
    }

    public function getRes(): array
    {
        return $this->parse(new Res());
    }

    public function getVer(): array
    {
        return $this->parseVouchers();
    }

    public function getKonto(): array
    {
        return $this->parse(new Konto());
    }

    function parse(ParseType $parseType): array
    {

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

    function parseVouchers(): array
    {
        $vouchers = [];
        $this->file->setFlags(\SplFileObject::DROP_NEW_LINE);
        while(!$this->file->eof()) {
            if (str_contains($this->file->fgets(), "#VER")) {
                $line = $this->file->current();
                $splitLine = explode(' ', $line);

                $voucher = new Voucher($splitLine[1], $splitLine[2], $splitLine[3], explode('"', $line)[1]);

                // jump two lines
                $voucherRows = [];
                while($this->file->current() != '}') {
                    if (str_starts_with($this->file->current(), "#TRANS")) {

                        $split = explode(" ", $this->file->current());

                        $amountPos = 0;
                        foreach ($split as $key => $splitLine) {
                            if (str_contains($splitLine, "}")) {
                                $amountPos = $key + 1;
                            }
                        }

                        $voucherRow = new Transaction($split[1], $split[$amountPos]);
                        $voucherRows[] = $voucherRow;
                    }
                    $this->file->next();
                }

                $voucher->trans = $voucherRows;
                $vouchers[] = $voucher;

            }
        }

        $this->file->rewind();
        return $vouchers;

    }

    public function validateFile(): bool
    {
        if (str_contains($this->file->getCurrentLine(), "#FLAGGA")) {
            return true;
        } else {
            return false;
        }
    }

}