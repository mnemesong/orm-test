<?php

namespace Mnemesong\OrmTestStubs\politics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmTest\checker\StructureMatchPoliticInterface;
use Mnemesong\OrmTestStubs\conds\ConstCond;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class ConstCondPolitic implements StructureMatchPoliticInterface
{
    /**
     * @return string
     */
    public function checkingCondClass(): string
    {
        return ConstCond::class;
    }

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond): bool
    {
        Assert::isAOf($cond, ConstCond::class);
        /* @var ConstCond $cond */
        return $cond->match();
    }
}