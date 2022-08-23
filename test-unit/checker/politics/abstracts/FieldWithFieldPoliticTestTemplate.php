<?php

namespace Mnemesong\OrmTestUnit\checker\politics\abstracts;

use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\politics\FieldWithFieldCondPolitic;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class FieldWithFieldPoliticTestTemplate extends TestCase
{
    /**
     * @return FieldWithFieldCondPolitic
     */
    protected function getPolitic(): FieldWithFieldCondPolitic
    {
        return new FieldWithFieldCondPolitic();
    }

    /**
     * @param string $operator
     * @return FieldWithFieldCond
     */
    protected function getCond(string $operator): FieldWithFieldCond
    {
        return Fit::field('f1')->field($operator, 'f2');
    }

    /**
     * @param string|null $f1Val
     * @param string|null $f2Val
     * @return Structure
     */
    protected function getStruct(?string $f1Val, ?string $f2Val): Structure
    {
        return new Structure(['f1' => $f1Val, 'f2' => $f2Val]);
    }

    /**
     * @return void
     */
    public function testCheckingCondClass(): void
    {
        $this->assertEquals(FieldWithFieldCond::class, $this->getPolitic()->checkingCondClass());
    }
}