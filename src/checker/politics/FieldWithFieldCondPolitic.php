<?php

namespace Mnemesong\OrmTest\checker\politics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\OrmTest\checker\SimpleOperatorsMatch;
use Mnemesong\OrmTest\checker\StructureMatchPoliticInterface;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class FieldWithFieldCondPolitic implements StructureMatchPoliticInterface
{
    /**
     * @return class-string
     */
    public function checkingCondClass(): string
    {
        return FieldWithFieldCond::class;
    }

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond): bool
    {
        Assert::isAOf($cond, FieldWithFieldCond::class);
        /* @var FieldWithFieldCond $cond */
        $val1 = $struct->get($cond->getField1());
        $val2 = $struct->get($cond->getField2());
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