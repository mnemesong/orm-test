<?php

namespace Mnemesong\OrmTestUnit\checker\politics\abstracts;

use Mnemesong\Fit\conditions\FieldWithValCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldWithValueCondPolitic;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class FieldWithValuePoliticTestTemplate extends TestCase
{
    /**
     * @return FieldWithValueCondPolitic
     */
    protected function getPolitic(): FieldWithValueCondPolitic
    {
        return new FieldWithValueCondPolitic();
    }

    /**
     * @param string $operator
     * @param $val
     * @return FieldWithValCond
     */
    protected function getCond(string $operator, $val): FieldWithValCond
    {
        return Fit::field('f1')->val($operator, $val);
    }

    /**
     * @param string|null $f1Val
     * @return Structure
     */
    protected function getStruct(?string $f1Val): Structure
    {
        return new Structure(['f1' => $f1Val]);
    }

    /**
     * @return void
     */
    public function testCheckingCondClass(): void
    {
        $this->assertEquals(FieldWithValCond::class, $this->getPolitic()->checkingCondClass());
    }
}