<?php

namespace Mnemesong\OrmTestUnit\saveRecords;

use Mnemesong\OrmCore\storages\RecordsSaveModelInterface;
use Mnemesong\OrmTestHelpers\createCommand\abstracts\RecordsSaveTestCase;
use Mnemesong\OrmTestHelpers\createCommand\RecordsSaveCasesFacade;
use Mnemesong\OrmTestHelpers\createCommand\RecordsSaveTestCaseCheckerTrait;
use Mnemesong\OrmTestStubs\RecordSaveModelStub;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class RecordSaveTest extends TestCase
{
    use RecordsSaveTestCaseCheckerTrait;

    /**
     * @return RecordsSaveTestCase[]
     */
    protected function getRecordSaveTestCases(): array
    {
        return RecordsSaveCasesFacade::getAllCases();
    }

    /**
     * @return TestCase
     */
    protected function getPhpunitTestcase(): TestCase
    {
        return $this;
    }

    /**
     * @param RecordsSaveModelInterface $recordsSaveModel
     * @return StructureCollection
     */
    protected function essenceCurrentStorageContains(RecordsSaveModelInterface $recordsSaveModel): StructureCollection
    {
        Assert::isAOf($recordsSaveModel, RecordSaveModelStub::class);
        /* @var RecordSaveModelStub $recordsSaveModel */
        return $recordsSaveModel->getStructs();
    }

    /**
     * @param array $structures
     * @param array $pks
     * @return RecordsSaveModelInterface
     */
    protected function getInitedByStructuresSaveModel(array $structures, array $pks): RecordsSaveModelInterface
    {
        return new RecordSaveModelStub(new StructureCollection($structures), $pks);
    }
}