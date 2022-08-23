<?php

namespace Mnemesong\OrmTest\exceptions;

class NotRegistredPoliticException extends \ErrorException
{
    /**
     * @param class-string $politicClass
     * @return static
     */
    public static function politic(string $politicClass): self
    {
        return new self('Have no registered politics for matching condition of class ' . $politicClass);
    }
}