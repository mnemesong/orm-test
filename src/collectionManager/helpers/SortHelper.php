<?php

namespace Mnemesong\OrmTest\collectionManager\helpers;

use Mnemesong\OrmTest\exceptions\UnknownSortTypeException;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

class SortHelper
{
    public static function sort(StructureCollection  $structs, array $sortFields): StructureCollection
    {
        return $structs->sortedBy(function (Structure $s1, Structure $s2) use ($sortFields) {
            foreach ($sortFields as $sf => $sortType)
            {
                $val1 = $s1->get($sf);
                $val2 = $s2->get($sf);
                if (is_null($val1) && is_null($val2)) {
                    return 0;
                } elseif (is_null($val1)) {
                    $r = strcmp('', '1');
                } elseif (is_null($val2)) {
                    $r = strcmp('1', '');
                } else {
                    $r = strcmp($val1, $val2);
                }
                if($r != 0) {
                    if($sortType === 'asc') {
                        return $r;
                    } elseif ($sortType === 'desc') {
                        return -$r;
                    }
                    throw UnknownSortTypeException::sortType($sortType, $sf);
                }
            }
            return 0;
        });
    }
}