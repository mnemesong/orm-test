<?php

namespace Mnemesong\OrmTest\checker;

use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

interface ScalarCalcPoliticInterface
{
    /**
     * @return class-string
     */
    public function checkingCondClass(): string;

    /**
     * @param StructureCollection $structs
     * @param ScalarSpecification $scalarSpec
     * @return scalar
     */
    public function calculate(StructureCollection $structs, ScalarSpecification $scalarSpec);
}