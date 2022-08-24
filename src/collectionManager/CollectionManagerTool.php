<?php

namespace Mnemesong\OrmTest\collectionManager;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
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
            foreach ($sortFields as $sf)
            {
                if ($s1->get($sf) > $s2->get($sf)) {
                    return -1;
                } elseif ($s1->get($sf) > $s2->get($sf)) {
                    return 1;
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