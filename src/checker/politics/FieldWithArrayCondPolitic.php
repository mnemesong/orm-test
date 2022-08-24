<?php

namespace Mnemesong\OrmTest\checker\politics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\OrmTest\checker\operatorMatch\ArrayOperatorsMatch;
use Mnemesong\OrmTest\checker\StructureMatchPoliticInterface;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class FieldWithArrayCondPolitic implements StructureMatchPoliticInterface
{
    /**
     * @return string
     */
    public function checkingCondClass(): string
    {
        return FieldWithArrayCond::class;
    }

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond): bool
    {
        Assert::isAOf($cond, FieldWithArrayCond::class);
        /* @var FieldWithArrayCond $cond */
        $val = $struct->get($cond->getField());
        $compArr = $cond->getValArr();
        $operator = $cond->getOperator();

        if ($operator === 'in') {
            return ArrayOperatorsMatch::forInOperatorMatch($val, $compArr, $cond->isCaseInsensitive());
        } elseif ($operator === '!in') {
            return ArrayOperatorsMatch::forNotInOperatorMatch($val, $compArr, $cond->isCaseInsensitive());
        }
        throw UnknownOperatorException::operator($operator);
    }
}