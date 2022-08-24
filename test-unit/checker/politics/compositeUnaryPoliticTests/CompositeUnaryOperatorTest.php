<?php

namespace Mnemesong\OrmTestUnit\checker\politics\compositeUnaryPoliticTests;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestStubs\conds\ConstCond;
use Mnemesong\OrmTestUnit\checker\politics\abstracts\CompositeUnaryPoliticTestTemplate;

class CompositeUnaryOperatorTest extends CompositeUnaryPoliticTestTemplate
{
    /**
     * @return void
     * @throws \Mnemesong\OrmTest\exceptions\NotRegistredPoliticException
     */
    public function testPoliticComparing(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('blabla');

        $cond = $this->getCond('!', new ConstCond(true));
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('!', new ConstCond(false));
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));
    }
}