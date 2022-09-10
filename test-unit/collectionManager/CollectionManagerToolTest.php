<?php

namespace Mnemesong\OrmTestUnit\collectionManager;

use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldUnaryCondPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\collectionManager\CollectionManagerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\RecordSearchCasesFacade;
use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\OrmTestHelpers\scalarSearch\ScalarSearchCasesFacade;
use Mnemesong\Structure\collections\StructureCollection;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class CollectionManagerToolTest extends TestCase
{
    /**
     * @param array<RecordsSearchTestCase> $testCases
     * @return void
     */
    protected function pureSearchTest(array $testCases): void
    {
        $colManager = new CollectionManagerTool(DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked());
        Assert::allIsAOf($testCases, RecordsSearchTestCase::class);
        foreach ($testCases as $case)
        {
            try {
                $result = $colManager->searchInCollection(
                    new StructureCollection($case->getInitStructures()),
                    $case->getSelectFields(),
                    $case->getSortFields(),
                    $case->getCond(),
                    $case->getLimit()
                );
            } catch (\Exception $exception) {
                throw new \RuntimeException('Error while testing ' . get_class($case)
                    . ' : ' . $exception->__toString());
            }
            $this->assertEquals($case->getResultStructures(), $result->getAll(), 'Failed of testcase'
                . get_class($case));
        }
    }

    /**
     * @param ScalarSearchTestCase[] $testCases
     * @return void
     */
    protected function pureScalarTest(array $testCases): void
    {
        $colManager = new CollectionManagerTool(DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked());
        Assert::allIsAOf($testCases, ScalarSearchTestCase::class);
        foreach ($testCases as $case)
        {
            try {
                $filtered = $colManager->searchInCollection(
                    new StructureCollection($case->getInitStructures()),
                    [],
                    [],
                    $case->getSpec(),
                    0
                );
                $result = $colManager->calculateScalars($filtered, $case->getScalars());
            } catch (\Exception $exception) {
                throw new \RuntimeException('Error while testing ' . get_class($case)
                    . ' : ' . $exception->__toString());
            }
            $this->assertEquals($case->getResultStructure(), $result, 'Failed of testcase'
                . get_class($case));
        }
    }

    /**
     * @return void
     */
    public function testAllSearchCases(): void
    {
        $this->pureSearchTest(RecordSearchCasesFacade::getAllCases());
    }

    /**
     * @return void
     */
    public function testAllScalarCases(): void
    {
        $this->pureScalarTest(ScalarSearchCasesFacade::getAllCases());
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $checker1 = (new StructuresCheckerTool())->withAddStructMatchPolitics([new FieldUnaryCondPolitic()]);
        $manager = new CollectionManagerTool($checker1);
        $this->assertEquals($checker1, $manager->getCheckerTool());

        $checker2 = DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked();
        $manager = new CollectionManagerTool($checker2);
        $this->assertEquals($checker2, $manager->getCheckerTool());
    }
}