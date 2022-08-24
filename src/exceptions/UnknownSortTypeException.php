<?php

namespace Mnemesong\OrmTest\exceptions;

use Mnemesong\Structure\Structure;

class UnknownSortTypeException extends \RuntimeException
{
    public static function sortType(string $type, string $field): self
    {
        return new self('Unknown sort type ' . $type . ' for field ' . $field);
    }
}