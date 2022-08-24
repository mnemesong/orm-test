<?php

namespace Mnemesong\OrmTestUnit\checker\politics\abstracts;

use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\conditions\UnaryFieldCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldUnaryCondPolitic;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithArrayCondPolitic;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class FieldWithUnaryPoliticTestTemplate extends TestCase
{
    /**
     * @return FieldUnaryCondPolitic
     */
    protected function getPolitic(): FieldUnaryCondPolitic
    {
        return new FieldUnaryCondPolitic();
    }

    /**
     * @param string $operator
     * @return UnaryFieldCond
     */
    protected function getCond(string $operator): UnaryFieldCond
    {
        return Fit::field('f1')->is($operator);
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
        $this->assertEquals(UnaryFieldCond::class, $this->getPolitic()->checkingCondClass());
    }
}