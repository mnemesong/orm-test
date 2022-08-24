<?php

namespace Mnemesong\OrmTest\checker\structureMatchPolitics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\OrmTest\checker\operatorMatch\ArrayOperatorsMatch;
use Mnemesong\OrmTest\checker\operatorMatch\UnaryOperatorsMatch;
use Mnemesong\OrmTest\checker\StructureMatchPoliticInterface;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class FieldUnaryCondPolitic implements StructureMatchPoliticInterface
{
    /**
     * @return string
     */
    public function checkingCondClass(): string
    {
        return UnaryFieldCond::class;
    }

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond): bool
    {
        Assert::isAOf($cond, UnaryFieldCond::class);
        /* @var UnaryFieldCond $cond */
        $val = $struct->get($cond->getField());
        $operator = $cond->getOperator();

        if ($operator === 'null') {
            return UnaryOperatorsMatch::forIsNullOperatorMatch($val);
        } elseif ($operator === '!null') {
            return UnaryOperatorsMatch::forIsNotNullOperatorMatch($val);
        }
        throw UnknownOperatorException::operator($operator);
    }
}