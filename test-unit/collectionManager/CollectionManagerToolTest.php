<?php

namespace Mnemesong\OrmTestUnit\collectionManager;

use Mnemesong\OrmTest\checker\structureMatchPolitics\FieldUnaryCondPolitic;
use Mnemesong\OrmTest\checker\StructuresCheckerTool;
use Mnemesong\OrmTest\collectionManager\CollectionManagerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\RecordSearchCasesFacade;
use Mnemesong\Structure\collections\StructureCollection;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class CollectionManagerToolTest extends TestCase
{
    /**
     * @param array<RecordsSearchTestCase> $testCases
     * @return void
     * @throws \ErrorException
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
     * @return void
     * @throws \ErrorException
     */
    public function testAllCases(): void
    {
        $this->pureSearchTest(RecordSearchCasesFacade::getAllCases());
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