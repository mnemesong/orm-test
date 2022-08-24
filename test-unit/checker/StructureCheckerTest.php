<?php

namespace Mnemesong\OrmTestUnit\checker;

use Mnemesong\Fit\conditions\FieldWithFieldCond;
use Mnemesong\Fit\Fit;
use Mnemesong\OrmTest\checker\politics\FieldWithFieldCondPolitic;
use Mnemesong\OrmTest\checker\politics\FieldWithValueCondPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\exceptions\NotRegistredPoliticException;
use Mnemesong\OrmTest\exceptions\UnknownOperatorException;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class StructureCheckerTest extends TestCase
{
    /**
     * @return void
     */
    public function testAddPolitics(): void
    {
        $checker1 = new StructuresCheckerTool();
        $this->assertEquals([], $checker1->getPoliticsArr());

        $checker2 = $checker1->withAddMatchPolitics([new FieldWithFieldCondPolitic()]);
        $this->assertEquals([], $checker1->getPoliticsArr());
        $this->assertEquals([new FieldWithFieldCondPolitic()], $checker2->getPoliticsArr());
    }

    /**
     * @return void
     * @throws NotRegistredPoliticException
     */
    public function testFieldsWithFieldsCheck(): void
    {
        $checker = (new StructuresCheckerTool())->withAddMatchPolitics([new FieldWithFieldCondPolitic()]);

        $struct = new Structure(['f1' => 'Mary', 'f2' => 'mary']);
        $cond = Fit::field('f1')->field('=', 'f2');
        $this->assertEquals(true, $checker->matchStructure($struct, $cond->asCaseInsensitive()));
        $this->assertEquals(false, $checker->matchStructure($struct, $cond->asCaseSensitive()));
    }

    /**
     * @return void
     * @throws NotRegistredPoliticException
     */
    public function testFieldsWithValueCheck(): void
    {
        $checker = (new StructuresCheckerTool())->withAddMatchPolitics([new FieldWithValueCondPolitic()]);

        $struct = new Structure(['f1' => 'Mary']);
        $cond = Fit::field('f1')->val('=', 'mary');
        $this->assertEquals(true, $checker->matchStructure($struct, $cond->asCaseInsensitive()));
        $this->assertEquals(false, $checker->matchStructure($struct, $cond->asCaseSensitive()));
    }

    /**
     * @return void
     */
    public function testUnknownPolitics(): void
    {
        $checker = (new StructuresCheckerTool())->withAddMatchPolitics([new FieldWithFieldCondPolitic()]);
        $struct = new Structure(['f1' => 'Mary', 'f2' => 'mary']);
        $cond = Fit::field('f1')->val('=', 'mary');
        $this->expectException(NotRegistredPoliticException::class);
        $checker->matchStructure($struct, $cond);
    }

    /**
     * @return void
     * @throws NotRegistredPoliticException
     */
    public function testPoliticDefinitionCheck(): void
    {
        $checker = (new StructuresCheckerTool())->withAddMatchPolitics([
            new FieldWithValueCondPolitic(),
            new FieldWithFieldCondPolitic(),
        ]);

        $struct = new Structure(['f1' => 'Mary', 'f2' => 'mary']);

        $cond = Fit::field('f1')->field('=', 'f2');
        $this->assertEquals(true, $checker->matchStructure($struct, $cond->asCaseInsensitive()));
        $this->assertEquals(false, $checker->matchStructure($struct, $cond->asCaseSensitive()));

        $cond = Fit::field('f1')->val('=', 'mary');
        $this->assertEquals(true, $checker->matchStructure($struct, $cond->asCaseInsensitive()));
        $this->assertEquals(false, $checker->matchStructure($struct, $cond->asCaseSensitive()));
    }
}