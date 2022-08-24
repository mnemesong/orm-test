<?php

namespace Mnemesong\OrmTest\checker\operatorMatch;

use Webmozart\Assert\Assert;

class SimpleOperatorsMatch
{
    /**
     * @param $val1
     * @param $val2
     * @param bool $isAsNumbers
     * @param bool $isCaseInsensitive
     * @return bool
     */
    public static function forEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forNotEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forMoreOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forMoreOrEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forNotMoreOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forLessOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forLessOrEqOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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
    public static function forNotLessOperatorMatch($val1, $val2, bool $isAsNumbers, bool $isCaseInsensitive): bool
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