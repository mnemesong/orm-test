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
use Webmozart\Assert\Assert;

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
    public function scalarsInCollection(
        StructureCollection $structs,
        array $scalars
    ): Structure {
        $result = [];
        foreach ($scalars as $key => $spec) {
            $result[$key] = (new ScalarSpeciticationPolitic())->calculate($structs, $spec);
        }
        return new Structure($result);
    }

    /**
     * @param StructureCollection $structs
     * @param Structure $addinStructure
     * @param bool $smartSave
     * @param string[] $primaryFields
     * @return StructureCollection
     * @throws \ErrorException
     */
    public function addToCollection(
        StructureCollection $structs,
        Structure $addinStructure,
        bool $smartSave,
        array $primaryFields
    ): StructureCollection {
        $itBeenUpdated = false;
        if(!empty($primaryFields)) {
            $this->assertStructureHasPks($addinStructure, $primaryFields);
            $pkAddStructure = $addinStructure->getOnly($primaryFields);
            $structs = $this
                ->updateIfPksEquals($structs, $pkAddStructure, $itBeenUpdated, $addinStructure, $smartSave);
        }
        if($itBeenUpdated === false) {
            $structs = $structs->withNewOneItem($addinStructure);
        }
        return $structs;
    }

    /**
     * @throws \ErrorException
     */
    protected function updateIfPksEquals(
        StructureCollection $structs,
        Structure $pkAddStructure,
        bool &$itBeenUpdated,
        Structure $addInStructure,
        bool $isSmartSave
    ): StructureCollection
    {
        return $structs
            ->reworkedBy(function(Structure $s) use ($pkAddStructure, &$itBeenUpdated, $addInStructure, $isSmartSave) {
                if($pkAddStructure->isIncludedStrictlyIn($s)) {
                    Assert::false($isSmartSave, 'Cant insert structure, case records with same pk exists yet');
                    $itBeenUpdated = true;
                    foreach ($addInStructure->toArray() as $key => $val)
                    {
                        $s = $s->with($key, $val);
                    }
                }
            });
    }

    /**
     * @param Structure $struct
     * @param string[] $pks
     * @return void
     */
    protected function assertStructureHasPks(Structure $struct, array $pks): void
    {
        foreach ($pks as $pk)
        {
            Assert::true($struct->has($pk), "Structure "
                . json_encode($struct->toArray(), JSON_UNESCAPED_UNICODE) . " has not primary field " . $pk);
        }
    }

}