<?php

namespace Mnemesong\OrmTest\collectionManager;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\OrmTest\exceptions\UnknownSortTypeException;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

class CollectionManagerTool
{
    protected StructuresCheckerTool $checkerTool;

    /**
     * @param StructuresCheckerTool $checkerTool
     */
    public function __construct(StructuresCheckerTool $checkerTool)
    {
        $this->checkerTool = $checkerTool;
    }

    /**
     * @return StructuresCheckerTool
     */
    public function getCheckerTool(): StructuresCheckerTool
    {
        return $this->checkerTool;
    }

    /**
     * @param StructureCollection $structs
     * @param array $selectFields
     * @param array $sortFields
     * @param CondInterface|null $cond
     * @param int $limit
     * @return StructureCollection
     * @throws \ErrorException
     */
    public function searchInCollection(StructureCollection $structs, array $selectFields, array $sortFields, ?CondInterface $cond, int $limit): StructureCollection
    {
        $checker = DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked();
        if(isset($cond)) {
            $structs = $structs->filteredBy(fn(Structure $s) => ($checker->matchStructure($s, $cond)));
        }
        $structs = $structs->sortedBy(function (Structure $s1, Structure $s2) use ($sortFields) {
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
        if(!empty($selectFields)) {
            $structs = new StructureCollection($structs->map(fn(Structure $s) => ($s->withOnly($selectFields))));
        }
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