<?php

namespace Mnemesong\OrmTest\checker\compositeMatchPolitics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\UnaryCompositeCond;
use Mnemesong\OrmTest\checker\CompositeMatchPoliticInterface;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class CompositeUnaryPolitic implements CompositeMatchPoliticInterface
{
    /**
     * @return string
     */
    public function checkingCondClass(): string
    {
        return UnaryCompositeCond::class;
    }

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @param StructuresCheckerTool $checkerTool
     * @return bool
     * @throws \Mnemesong\OrmTest\exceptions\NotRegistredPoliticException
     */
    public function isMatch(Structure $struct, CondInterface $cond, StructuresCheckerTool $checkerTool): bool
    {
        Assert::isAOf($cond, UnaryCompositeCond::class);
        /* @var UnaryCompositeCond $cond */
        $operator = $cond->getOperator();
        if($operator === '!') {
            return !$checkerTool->matchStructure($struct, $cond->getCond());
        }
        throw UnknownOperatorException::operator($operator);
    }
}