<?php

namespace Mnemesong\OrmTest\collectionManager\helpers;

use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

class LimitsHelper
{
    /**
     * @param StructureCollection $structs
     * @param int $limit
     * @return StructureCollection
     */
    public static function limitation(StructureCollection $structs, int $limit): StructureCollection
    {
        if($limit > 0) {
            $iter = 0;
            $structs = $structs->filteredBy(function (Structure $s) use (&$iter, $limit) {
                $iter++;
                return $iter <= $limit;
            });
        }
        return $structs;
    }
}