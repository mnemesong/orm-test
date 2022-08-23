<?php

namespace Mnemesong\OrmTestUnit\checker\politics\fieldWithFieldPoliticTests;

use Mnemesong\OrmTestUnit\checker\politics\abstracts\FieldWithFieldPoliticTestTemplate;

class FieldWithFieldOnlyEqOperatorTest extends FieldWithFieldPoliticTestTemplate
{
    /**
     * @return void
     */
    public function testEqualsOfSameStrings(): void
    {
        $cond = $this->getCond('=')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asStr()->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfObliviousNotSameStrings(): void
    {
        $cond = $this->getCond('=')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Jame');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asStr()->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'Jame');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNonNumericValuesComparsingAsNumericException1(): void
    {
        $cond = $this->getCond('=')->asStr()->asNum();
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
        $cond = $this->getCond('=')->asStr()->asNum();
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
        $cond = $this->getCond('=')->asStr()->asNum();
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
        $cond = $this->getCond('=')->asStr()->asNum();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('', '');
        $this->expectException(\InvalidArgumentException::class);
        $politic->isMatch($struct, $cond);
    }

    /**
     * @return void
     */
    public function testEqualsOfCaseDiffSameStrings(): void
    {
        $cond = $this->getCond('=')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('mary', 'Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asStr()->asCaseInsensitive();
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

        $cond = $this->getCond('=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringNumWithRealNum(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('12', 12);

        $cond = $this->getCond('=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringFloatWithRealFloat(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('1894.87491', 1894.87491);

        $cond = $this->getCond('=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNullValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct(null, null);

        $cond = $this->getCond('=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asStr()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asNum()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testDiffValuesTypeWithNullComparing(): void
    {
        $politic = $this->getPolitic();
        $cond = $this->getCond('=')->asStr();

        $struct = $this->getStruct('Mary', null);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(21412, null);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('', null);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(45512.214, null);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEmptyValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('', '');

        $cond = $this->getCond('=')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('=')->asStr()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

}