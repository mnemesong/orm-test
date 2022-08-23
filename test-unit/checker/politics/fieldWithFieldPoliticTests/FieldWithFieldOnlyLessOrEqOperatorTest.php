<?php

namespace Mnemesong\OrmTestUnit\checker\politics\fieldWithFieldPoliticTests;

use Mnemesong\OrmTestUnit\checker\politics\abstracts\FieldWithFieldPoliticTestTemplate;

class FieldWithFieldOnlyLessOrEqOperatorTest extends FieldWithFieldPoliticTestTemplate
{
    /**
     * @return void
     */
    public function testNotEqualsOfSameStrings(): void
    {
        $cond = $this->getCond('<=')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asStr()->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNotEqualsOfObliviousNotSameStrings(): void
    {
        $cond = $this->getCond('<=')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Jame');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asStr()->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Jame', 'Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNonNumericValuesComparsingAsNumericException1(): void
    {
        $cond = $this->getCond('<=')->asStr()->asNum();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Mary');
        $this->expectException(\InvalidArgumentException::class);
        $politic->isMatch($struct, $cond);
    }

    /**
     * @return void
     */
    public function testNonNumericValuesComparsingAsNumericException2(): void
    {
        $cond = $this->getCond('<=')->asNum();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('a12', 'a12');
        $this->expectException(\InvalidArgumentException::class);
        $politic->isMatch($struct, $cond);
    }

    /**
     * @return void
     */
    public function testNonNumericValuesComparsingAsNumericException3(): void
    {
        $cond = $this->getCond('<=')->asNum();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('441f', '441f');
        $this->expectException(\InvalidArgumentException::class);
        $politic->isMatch($struct, $cond);
    }

    /**
     * @return void
     */
    public function testNonNumericValuesComparsingAsNumericException4(): void
    {
        $cond = $this->getCond('<=')->asStr()->asNum();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('', '');
        $this->expectException(\InvalidArgumentException::class);
        $politic->isMatch($struct, $cond);
    }

    /**
     * @return void
     */
    public function testNotEqualsOfCaseDiffSameStrings(): void
    {
        $cond = $this->getCond('<=')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('mary', 'Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asStr()->asCaseInsensitive();
        $struct = $this->getStruct('Mary', 'mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('mary', 'Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringNums(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('12', '12');

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('121', '12');

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringNumWithRealNum(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('12', 12);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('121', 12);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(12, '121');

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringFloatWithRealFloat(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('1894.87491', 1894.87491);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('1894.37431', 1894.87491);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNullValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct(null, null);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asStr()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEmptyValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('', '');

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asStr()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function comparingNumericVaues() {
        $politic = $this->getPolitic();
        $struct = $this->getStruct(45, 121);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(121, 45);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(121.11, 45.2);

        $cond = $this->getCond('<=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('<=')->asNum();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }
}