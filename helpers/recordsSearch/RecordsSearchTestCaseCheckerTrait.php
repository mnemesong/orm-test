<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

trait RecordsSearchTestCaseCheckerTrait
{
    /**
     * @return RecordsSearchTestCase[]
     */
    abstract protected function getRecordSearchTestCases(): array;

    /**
     * @return TestCase
     */
    abstract protected function getPhpunitTestcase(): TestCase;

    /**
     * @param Structure[] $structures
     * @return RecordsSearchModelInterface
     */
    abstract protected function getInitedByStructuresSearchModel(array $structures): RecordsSearchModelInterface;

    /**
     * @return void
     */
    public function testAll(): void
    {
        foreach ($this->getRecordSearchTestCases() as $testCase)
        {
            try {
                $resultStructuresColl = $this
                    ->getInitedByStructuresSearchModel($testCase->getInitStructures())
                    ->findRecords(
                        $testCase->getSelectFields(),
                        $testCase->getSortFields(),
                        $testCase->getCond(),
                        $testCase->getLimit()
                    );
            } catch (\Exception $exception) {
                throw new \RuntimeException('Error while testing ' . get_class($testCase)
                    . ' : ' . $exception->__toString());
            }
            $this->getPhpunitTestcase()->assertEquals($resultStructuresColl->getAll(), $testCase->getResultStructures());
        }
    }
}