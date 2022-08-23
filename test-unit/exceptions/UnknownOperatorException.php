<?php

namespace Mnemesong\OrmTestUnit\exceptions;

class UnknownOperatorException extends \RuntimeException
{
    /* @phpstan-ignore-next-line  */
    protected $message = 'Unknown operator';

    /**
     * @param string $operator
     * @return static
     */
    public static function operator(string $operator): self
    {
        return new self('Unknown operator: ' . $operator);
    }
}