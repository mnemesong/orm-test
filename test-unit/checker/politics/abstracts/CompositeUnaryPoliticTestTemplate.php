<?php

namespace Mnemesong\OrmTestUnit\checker\politics\abstracts;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\UnaryCompositeCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\compositeMatchPolitics\CompositeUnaryPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithValueCondPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class CompositeUnaryPoliticTestTemplate extends TestCase
{
    /**
     * @return CompositeUnaryPolitic
     */
    protected function getPolitic(): CompositeUnaryPolitic
    {
        return new CompositeUnaryPolitic();
    }

    /**
     * @param string $operator
     * @param CondInterface $cond
     * @return UnaryCompositeCond
     */
    protected function getCond(string $operator, CondInterface $cond): UnaryCompositeCond
    {
        return Fit::notThat($cond);
    }

    /**
     * @return StructuresCheckerTool
     */
    protected function getCheckerTool(): StructuresCheckerTool
    {
        return (new StructuresCheckerTool())->withAddStructMatchPolitics([
            new FieldWithValueCondPolitic()
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
        $this->assertEquals(UnaryCompositeCond::class, $this->getPolitic()->checkingCondClass());
    }
}