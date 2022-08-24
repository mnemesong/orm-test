<?php

namespace Mnemesong\OrmTest;

use Mnemesong\OrmTest\checker\compositeMatchPolitics\CompositePolyPolitic;
use Mnemesong\OrmTest\checker\compositeMatchPolitics\CompositeUnaryPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldUnaryCondPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithArrayCondPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithFieldCondPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithValueCondPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;

class DefaultConfiguredCheckedFacade
{
    /**
     * @return StructuresCheckerTool
     */
    public static function getDefaultConfiguredChecked(): StructuresCheckerTool
    {
        return (new StructuresCheckerTool())
            ->withAddStructMatchPolitics([
                new FieldUnaryCondPolitic(),
                new FieldWithArrayCondPolitic(),
                new FieldWithFieldCondPolitic(),
                new FieldWithValueCondPolitic()
            ])
            ->withAddCompositeMatchPolitics([
                new CompositePolyPolitic(),
                new CompositeUnaryPolitic(),
            ]);
    }
}