<?php

namespace Mnemesong\OrmTest\checker\structureMatchPolitics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\OrmTest\checker\operatorMatch\SimpleOperatorsMatch;
use Mnemesong\OrmTest\checker\StructureMatchPoliticInterface;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class FieldWithValueCondPolitic implements StructureMatchPoliticInterface
{
    /**
     * @return class-string
     */
    public function checkingCondClass(): string
    {
        return FieldWithValCond::class;
    }

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond): bool
    {
        Assert::isAOf($cond, FieldWithValCond::class);
        /* @var FieldWithValCond $cond */
        $val1 = $struct->get($cond->getFieldName());
        $val2 = $cond->getValue();
        $operator = $cond->getOperator();

        if ($operator === '=') {
            return SimpleOperatorsMatch::forEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '!=') {
            return SimpleOperatorsMatch::forNotEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '>') {
            return SimpleOperatorsMatch::forMoreOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '>=') {
            return SimpleOperatorsMatch::forMoreOrEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '!>') {
            return SimpleOperatorsMatch::forNotMoreOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '<') {
            return SimpleOperatorsMatch::forLessOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '<=') {
            return SimpleOperatorsMatch::forLessOrEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '!<') {
            return SimpleOperatorsMatch::forNotLessOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        }
        throw UnknownOperatorException::operator($operator);
    }
}