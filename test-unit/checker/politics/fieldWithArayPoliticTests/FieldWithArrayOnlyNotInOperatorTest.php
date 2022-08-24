<?php

namespace Mnemesong\OrmTestUnit\checker\politics\fieldWithArayPoliticTests;

use Mnemesong\OrmTestUnit\checker\politics\abstracts\FieldWithArrayPoliticTestTemplate;

class FieldWithArrayOnlyNotInOperatorTest extends FieldWithArrayPoliticTestTemplate
{
    /**
     * @return void
     */
    public function testEqualsOfSameStrings(): void
    {
        $cond = $this->getCond('!in', ['Mary', 'Julia']);
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', ['Mary', 'Julia'])->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary',);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfObliviousNotSameStrings(): void
    {
        $cond = $this->getCond('!in', ['Sam', 'Julia']);
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', ['Sam', 'Julia'])->asCaseSensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfCaseDiffSameStrings(): void
    {
        $cond = $this->getCond('!in', ['mary', 'sam']);
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', ['Mary', 'Sam']);
        $struct = $this->getStruct('mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', ['mary', 'sam'])->asCaseInsensitive();
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', ['Mary', 'Sam'])->asCaseInsensitive();
        $struct = $this->getStruct('mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEqualsOfStringNumWithRealNum(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('12');

        $cond = $this->getCond('!in', [12, 14]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', [13, 14]);
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(12);

        $cond = $this->getCond('!in', ['12', '14']);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', ['13', '14']);
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', [12, 14]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', [13, 14]);
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
        $struct = $this->getStruct('1894.87491');

        $cond = $this->getCond('!in', [1894.87491, 8931.41]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $cond->asCaseInsensitive();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', [1214.87491, 8931.41]);
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
        $struct = $this->getStruct(null);

        $cond = $this->getCond('!in', [null, 'asd']);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', [null, 'asd'])->asCaseInsensitive();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('');

        $cond = $this->getCond('!in', [null, 'asd']);
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testDiffValuesTypeWithNullComparing(): void
    {
        $politic = $this->getPolitic();
        $cond = $this->getCond('!in', [null]);

        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(21412);
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('');
        $this->assertEquals(true, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(45512.214);
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }

    /**
     * @return void
     */
    public function testEmptyValues(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('');

        $cond = $this->getCond('!in', ['']);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $cond = $this->getCond('!in', [''])->asCaseInsensitive();
        $this->assertEquals(false, $politic->isMatch($struct, $cond));
    }
}