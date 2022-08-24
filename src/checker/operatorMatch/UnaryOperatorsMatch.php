<?php

namespace Mnemesong\OrmTest\checker\operatorMatch;

class UnaryOperatorsMatch
{
    /**
     * @param $val
     * @return bool
     */
    public static function forIsNullOperatorMatch($val): bool
    {
        return is_null($val);
    }

    /**
     * @param $val
     * @return bool
     */
    public static function forIsNotNullOperatorMatch($val): bool
    {
        return !is_null($val);
    }
}