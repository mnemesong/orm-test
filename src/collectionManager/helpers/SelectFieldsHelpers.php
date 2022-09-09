<?php

namespace Mnemesong\OrmTest\collectionManager\helpers;

use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

class SelectFieldsHelpers
{
    /**
     * @param StructureCollection $structs
     * @param array $selectFields
     * @return StructureCollection
     */
    public static function selectFields(StructureCollection $structs, array $selectFields): StructureCollection
    {
        if(!empty($selectFields)) {
            $structs = new StructureCollection($structs->map(fn(Structure $s) => ($s->withOnly($selectFields))));
        }
        return $structs;
    }
}