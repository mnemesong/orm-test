<?php

namespace Mnemesong\OrmTestUnit\checker\politics\abstracts;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\PolyCompositeCond;
use Mnemesong\Fit\conditions\UnaryCompositeCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\compositeMatchPolitics\CompositePolyPolitic;
use Mnemesong\OrmTest\checker\compositeMatchPolitics\CompositeUnaryPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithValueCondPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTestStubs\politics\ConstCondPolitic;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class CompositePolyPoliticTestTemplate extends TestCase
{
    /**
     * @return CompositePolyPolitic
     */
    protected function getPolitic(): CompositePolyPolitic
    {
        return new CompositePolyPolitic();
    }

    /**
     * @param string $operator
     * @param array<CondInterface> $conds
     * @return PolyCompositeCond
     */
    protected function getCond(string $operator, array $conds): PolyCompositeCond
    {
        Assert::allIsAOf($conds, CondInterface::class);
        return new PolyCompositeCond($operator, $conds);
    }

    /**
     * @return StructuresCheckerTool
     */
    protected function getCheckerTool(): StructuresCheckerTool
    {
        return (new StructuresCheckerTool())->withAddStructMatchPolitics([
            new ConstCondPolitic()
        ]);
    }

    /**
     * @param string|null $fVal
     * @return Structure
     */
    protected function getStruct(?string $fVal): Structure
    {
        return new Structure(['f1' => $fVal]);
    }

    /**
     * @return void
     */
    public function testCheckingCondClass(): void
    {
        $this->assertEquals(PolyCompositeCond::class, $this->getPolitic()->checkingCondClass());
    }
}