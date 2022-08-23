<?php

namespace Mnemesong\OrmTest\checker;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Structure\Structure;

interface StructureMatchPoliticInterface
{
    /**
     * @return class-string
     */
    public function checkingCondClass(): string;

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond): bool;
}