<?php

namespace Mnemesong\OrmTest\checker\operatorMatch;

class ArrayOperatorsMatch
{
    /**
     * @param string|null $val
     * @param array<scalar|null> $arrVal
     * @param bool $isCaseInsensitive
     * @return bool
     */
    public static function forInOperatorMatch(?string $val, array $arrVal, bool $isCaseInsensitive): bool
    {
        if($isCaseInsensitive === false) {
            return in_array($val, $arrVal, true);
        }
        $arrVal = array_map(fn($item) => (isset($item) ? mb_strtolower(strval($item)) : null), $arrVal);
        $val = isset($val) ? mb_strtolower(strval($val)) : null;
        return in_array($val, $arrVal, true);
    }

    /**
     * @param string|null $val
     * @param array<scalar|null> $arrVal
     * @param bool $isCaseInsensitive
     * @return bool
     */
    public static function forNotInOperatorMatch(?string $val, array $arrVal, bool $isCaseInsensitive): bool
    {
        if($isCaseInsensitive === false) {
            return !in_array($val, $arrVal, true);
        }
        $arrVal = array_map(fn($item) => (isset($item) ? mb_strtolower(strval($item)) : null), $arrVal);
        $val = isset($val) ? mb_strtolower(strval($val)) : null;
        return !in_array($val, $arrVal, true);
    }
}