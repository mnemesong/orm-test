<?php

namespace Mnemesong\OrmTestUnit\checker\politics\abstracts;

use Mnemesong\Fit\conditions\FieldWithArrayCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\politics\FieldWithArrayCondPolitic;
use Mnemesong\OrmTest\checker\politics\FieldWithValueCondPolitic;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class FieldWithArrayPoliticTestTemplate extends TestCase
{
    /**
     * @return FieldWithArrayCondPolitic
     */
    protected function getPolitic(): FieldWithArrayCondPolitic
    {
        return new FieldWithArrayCondPolitic();
    }

    /**
     * @param string $operator
     * @param array<scalar|null> $array
     * @return FieldWithArrayCond
     */
    protected function getCond(string $operator, array $array): FieldWithArrayCond
    {
        return Fit::field('f1')->arr($operator, $array);
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
        $this->assertEquals(FieldWithArrayCond::class, $this->getPolitic()->checkingCondClass());
    }
}