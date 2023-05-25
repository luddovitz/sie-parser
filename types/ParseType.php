<?php

namespace SieParser\types;

abstract class ParseType
{
    abstract function getFlag(): string;
    abstract function parse(array $line): mixed;

}