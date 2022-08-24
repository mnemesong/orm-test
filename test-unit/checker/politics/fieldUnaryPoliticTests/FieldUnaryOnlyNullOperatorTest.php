<?php

namespace Mnemesong\OrmTestUnit\checker\politics\fieldUnaryPoliticTests;

use Mnemesong\OrmTestUnit\checker\politics\abstracts\FieldWithArrayPoliticTestTemplate;
use Mnemesong\OrmTestUnit\checker\politics\abstracts\FieldWithUnaryPoliticTestTemplate;

class FieldUnaryOnlyNullOperatorTest extends FieldWithUnaryPoliticTestTemplate
{
    /**
     * @return void
     */
    public function testNullComparing(): void
    {
        $cond = $this->getCond('null');
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('12');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(12);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(12.41);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(0);
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('12.41');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct('');
        $this->assertEquals(false, $politic->isMatch($struct, $cond));

        $struct = $this->getStruct(null);
        $this->assertEquals(true, $politic->isMatch($struct, $cond));
    }
}