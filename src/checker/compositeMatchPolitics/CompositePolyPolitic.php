<?php

namespace Mnemesong\OrmTest\checker\compositeMatchPolitics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\PolyCompositeCond;
use Mnemesong\OrmTest\checker\CompositeMatchPoliticInterface;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class CompositePolyPolitic implements CompositeMatchPoliticInterface
{
    /**
     * @return string
     */
    public function checkingCondClass(): string
    {
        return PolyCompositeCond::class;
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
        Assert::isAOf($cond, PolyCompositeCond::class);
        /* @var PolyCompositeCond $cond */
        $operator = $cond->getOperator();
        if ($operator === 'and') {
            foreach ($cond->getConds() as $includedCond)
            {
                if($checkerTool->matchStructure($struct, $includedCond) === false) {
                    return false;
                }
            }
            return true;
        } elseif ($operator === 'or') {
            foreach ($cond->getConds() as $includedCond)
            {
                if($checkerTool->matchStructure($struct, $includedCond) === true) {
                    return true;
                }
            }
            return false;
        }
        throw UnknownOperatorException::operator($operator);
    }
}