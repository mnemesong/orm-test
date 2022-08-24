<?php

namespace Mnemesong\OrmTestUnit\checker\politics\compositePolyPoliticTests;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestStubs\conds\ConstCond;
use Mnemesong\OrmTestUnit\checker\politics\abstracts\CompositePolyPoliticTestTemplate;

class CompositePolyOperatorTest extends CompositePolyPoliticTestTemplate
{
    /**
     * @return void
     * @throws \Mnemesong\OrmTest\exceptions\NotRegistredPoliticException
     */
    public function testAndPoliticComparing(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('blabla');

        $cond = $this->getCond('and', [
            new ConstCond(true),
            new ConstCond(true),
        ]);
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('and', [
            new ConstCond(true),
            new ConstCond(false),
        ]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('and', [
            new ConstCond(false),
            new ConstCond(true),
        ]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('and', [
            new ConstCond(false),
            new ConstCond(false),
        ]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));
    }

    /**
     * @return void
     * @throws \Mnemesong\OrmTest\exceptions\NotRegistredPoliticException
     */
    public function testOrPoliticComparing(): void
    {
        $politic = $this->getPolitic();
        $struct = $this->getStruct('blabla');

        $cond = $this->getCond('or', [
            new ConstCond(true),
            new ConstCond(true),
        ]);
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('or', [
            new ConstCond(true),
            new ConstCond(false),
        ]);
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('or', [
            new ConstCond(false),
            new ConstCond(true),
        ]);
        $this->assertEquals(true, $politic->isMatch($struct, $cond, $this->getCheckerTool()));

        $cond = $this->getCond('or', [
            new ConstCond(false),
            new ConstCond(false),
        ]);
        $this->assertEquals(false, $politic->isMatch($struct, $cond, $this->getCheckerTool()));
    }
}