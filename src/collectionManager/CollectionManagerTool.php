<?php

namespace Mnemesong\OrmTest\collectionManager;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmTest\checker\scalarCalcPolitics\ScalarSpeciticationPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\collectionManager\helpers\CondFilterHelper;
use Mnemesong\OrmTest\collectionManager\helpers\LimitsHelper;
use Mnemesong\OrmTest\collectionManager\helpers\SelectFieldsHelpers;
use Mnemesong\OrmTest\collectionManager\helpers\SortHelper;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\OrmTest\exceptions\UnknownSortTypeException;
use Mnemesong\Scalarex\specification\ScalarSpecification;
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
     */
    public function searchInCollection(
        StructureCollection $structs,
        array $selectFields,
        array $sortFields,
        ?CondInterface $cond,
        int $limit
    ): StructureCollection
    {
        $structs = CondFilterHelper::filterByCond($structs, $cond);
        $structs = SortHelper::sort($structs, $sortFields);
        $structs = SelectFieldsHelpers::selectFields($structs, $selectFields);
        $structs = LimitsHelper::limitation($structs, $limit);
        return $structs;
    }

    /**
     * @param StructureCollection $structs
     * @param ScalarSpecification[] $scalars
     * @return Structure
     */
    public function calculateScalars(
        StructureCollection $structs,
        array $scalars
    ): Structure {
        $result = [];
        foreach ($scalars as $key => $spec) {
            $result[$key] = (new ScalarSpeciticationPolitic())->calculate($structs, $spec);
        }
        return new Structure($result);
    }

}