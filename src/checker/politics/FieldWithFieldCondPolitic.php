<?php

namespace Mnemesong\OrmTest\checker\politics;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\OrmTest\checker\StructureMatchPoliticInterface;
use Mnemesong\OrmTestUnit\exceptions\UnknownOperatorException;
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
            return $this->forEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '!=') {
            return $this->forNotEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '>') {
            return $this->forMoreOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '>=') {
            return $this->forMoreOrEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '!>') {
            return $this->forNotMoreOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '<') {
            return $this->forLessOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '<=') {
            return $this->forLessOrEqOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        } elseif ($operator === '!<') {
            return $this->forNotLessOperatorMatch($val1, $val2, $cond->isAsNumbers(), $cond->isCaseInsensitive());
        }
        throw UnknownOperatorException::operator($operator);
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) && is_null($val2)) {
            return true;
        }
        if(is_null($val1) || is_null($val2)) {
            return false;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 == $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) === 0;
        }
        return $val1 === $val2;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forNotEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) && is_null($val2)) {
            return false;
        }
        if(is_null($val1) || is_null($val2)) {
            return true;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 != $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) !== 0;
        }
        return $val1 !== $val2;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forMoreOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) || is_null($val2)) {
            return false;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 > $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) > 0;
        }
        return strcmp($val1, $val2) > 0;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forMoreOrEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) && is_null($val2)) {
            return true;
        }
        if(is_null($val1) || is_null($val2)) {
            return false;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 >= $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) >= 0;
        }
        return strcmp($val1, $val2) >= 0;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forNotMoreOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) || is_null($val2)) {
            return true;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 <= $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) <= 0;
        }
        return strcmp($val1, $val2) <= 0;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forLessOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) || is_null($val2)) {
            return false;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 < $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) < 0;
        }
        return strcmp($val1, $val2) < 0;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forLessOrEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) && is_null($val2)) {
            return true;
        }
        if(is_null($val1) || is_null($val2)) {
            return false;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 <= $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) <= 0;
        }
        return strcmp($val1, $val2) <= 0;
    }

    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    protected function forNotLessOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
    {
        if(is_null($val1) || is_null($val2)) {
            return true;
        }
        if($isAsNumbers) {
            Assert::numeric($val1, 'Try to comparing not numeric value "' . $val1 . '" as numeric');
            Assert::numeric($val2, 'Try to comparing not numeric value "' . $val2 . '" as numeric');
            return $val1 >= $val2;
        }
        $val2 = strval($val2);
        $val1 = strval($val1);
        if($isCaseInsensitive) {
            return strcasecmp($val1, $val2) >= 0;
        }
        return strcmp($val1, $val2) >= 0;
    }
}