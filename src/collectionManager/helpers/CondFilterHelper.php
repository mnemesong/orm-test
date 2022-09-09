<?php

namespace Mnemesong\OrmTest\collectionManager\helpers;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

class CondFilterHelper
{
    /**
     * @param StructureCollection $structs
     * @param CondInterface|null $cond
     * @return StructureCollection
     */
    public static function filterByCond(StructureCollection $structs, ?CondInterface $cond): StructureCollection
    {
        if(isset($cond)) {
            $checker = DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked();
            $structs = $structs->filteredBy(fn(Structure $s) => ($checker->matchStructure($s, $cond)));
        }
        return $structs;
    }
}