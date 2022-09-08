<?php

namespace Mnemesong\OrmTestUnit\recordsSearch;

use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\RecordSearchCasesFacade;
use Mnemesong\OrmTestHelpers\recordsSearch\RecordsSearchTestCaseCheckerTrait;
use Mnemesong\OrmTestStubs\SearchModelStub;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class TestRecordsSearchTraitTest extends TestCase
{
    use RecordsSearchTestCaseCheckerTrait;

    protected function getRecordSearchTestCases(): array
    {
        return RecordSearchCasesFacade::getAllCases();
    }

    protected function getPhpunitTestcase(): TestCase
    {
        return $this;
    }

    protected function getInitedByStructuresSearchModel(array $structures): RecordsSearchModelInterface
    {
        return new SearchModelStub(new StructureCollection($structures));
    }
}