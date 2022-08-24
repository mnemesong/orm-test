<?php

namespace Mnemesong\OrmTestUnit\checker\politics\compositeUnaryPoliticTests;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestUnit\checker\politics\abstracts\CompositeUnaryPoliticTestTemplate;

class CompositeUnaryOnlyNullOperatorTest extends CompositeUnaryPoliticTestTemplate
{
    /**
     * @return void
     * @throws \Mnemesong\OrmTest\exceptions\NotRegistredPoliticException
     */
    public function testNotNullComparing(): void
    {
        $cond = $this->getCond('!', Fit::field('f1')->val('=', 'Mary'));
        $politic = $this->getPolitic();
        $struct = $this->getStruct('Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $struct = $this->getStruct('John');
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $struct = $this->getStruct('');
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $struct = $this->getStruct(null);
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('!', Fit::field('f1')->val('=', 'mary'));
        $struct = $this->getStruct('Mary');
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('!', Fit::field('f1')->val('=', 'mary')->asCaseInsensitive());
        $struct = $this->getStruct('Mary');
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));
    }
}