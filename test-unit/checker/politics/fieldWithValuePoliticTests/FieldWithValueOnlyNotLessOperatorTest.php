<?php

namespace Mnemesong\OrmTestUnit\checker\politics\fieldWithValuePoliticTests;

use Mnemesong\OrmTestUnit\checker\politics\abstracts\FieldWithValuePoliticTestTemplate;

class FieldWithValueOnlyNotLessOperatorTest extends FieldWithValuePoliticTestTemplate
{
    /**
     * @return void
     */
    public function testNotEqualsOfSameStrings(): void
    {
        $cond = $this->getCond('!<', 'Mary')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 'Mary')->asStr()->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNotEqualsOfObliviousNotSameStrings(): void
    {
        $cond = $this->getCond('!<', 'James')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 'Mary')->asStr()->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('James');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNotEqualsOfCaseDiffSameStrings(): void
    {
        $cond = $this->getCond('!<', 'mary')->asStr();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary', 'mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 'Mary')->asStr();
        $struct = $this->getStruct('mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 'mary')->asStr()->asCaseInsensitive();
        $struct = $this->getStruct('Mary', 'mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 'Mary')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringNums(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('12');

        $cond = $this->getCond('!<', '12')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', '12')->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('121');
        $cond = $this->getCond('!<', '12')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('12');
        $cond = $this->getCond('!<', '121')->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringNumWithRealNum(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('12');

        $cond = $this->getCond('!<', 12)->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 12)->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('121');

        $cond = $this->getCond('!<', 12)->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringFloatWithRealFloat(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('1894.87491');

        $cond = $this->getCond('!<', 1894.87491)->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 1894.87491)->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('1894.37431');

        $cond = $this->getCond('!<', 1894.87491)->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testNullValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct(null);

        $cond = $this->getCond('!<', null)->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', null)->asStr()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', null)->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', null)->asNum()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEmptyValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('');

        $cond = $this->getCond('!<', '')->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', '')->asStr()->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testComparingNumericVaues() {
        $politic = $this->getPolitic();
        $struct = $this->getStruct(45);

        $cond = $this->getCond('!<', 121)->asStr();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 121)->asNum();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(121);

        $cond = $this->getCond('!<', 45)->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 45)->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(121.11);

        $cond = $this->getCond('!<', 45.2)->asStr();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!<', 45.2)->asNum();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }
}