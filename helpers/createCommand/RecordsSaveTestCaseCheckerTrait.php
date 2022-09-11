<?php

namespace Mnemesong\OrmTestHelpers\createCommand;

use Mnemesong\OrmCore\storages\RecordsSaveModelInterface;
use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\OrmTestHelpers\createCommand\abstracts\RecordsSaveTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

trait RecordsSaveTestCaseCheckerTrait
{
    /**
     * @return RecordsSaveTestCase[]
     */
    abstract protected function getRecordSaveTestCases(): array;

    /**
     * @return TestCase
     */
    abstract protected function getPhpunitTestcase(): TestCase;

    /**
     * @param RecordsSaveModelInterface $recordsSaveModel
     * @return StructureCollection
     */
    abstract protected function essenceCurrentStorageContains(
        RecordsSaveModelInterface $recordsSaveModel
    ): StructureCollection;


    /**
     * @param Structure[] $structures
     * @return RecordsSaveModelInterface
     */
    abstract protected function getInitedByStructuresSaveModel(array $structures): RecordsSaveModelInterface;

    public function testAll(): void
    {
        foreach ($this->getRecordSaveTestCases() as $testCase)
        {
            try {
                $saveModel =  $this->getInitedByStructuresSaveModel($testCase->getInitStructures());
                $saveModel
                    ->createRecord(
                        $testCase->getSavingStructure(),
                        $testCase->isSmartSave()
                    );
                $result = $this->essenceCurrentStorageContains($saveModel);
                $this->getPhpunitTestcase()->assertEquals($result, $testCase->getResultStructures());
            } catch (\Exception $exception) {
                throw new \RuntimeException('Error while testing ' . get_class($testCase)
                    . ' : ' . $exception->__toString());
            }
        }
    }
}