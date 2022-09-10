<?php

namespace Mnemesong\OrmTestUnit\scalarsSearch;

use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\OrmTestHelpers\scalarSearch\ScalarSearchCasesFacade;
use Mnemesong\OrmTestHelpers\scalarSearch\ScalarSearchTestCaseCheckerTrait;
use Mnemesong\OrmTestStubs\ScalarModelStub;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class ScalarsSearchTest extends TestCase
{
    use ScalarSearchTestCaseCheckerTrait;

    /**
     * @return array
     */
    protected function getRecordSearchTestCases(): array
    {
       return ScalarSearchCasesFacade::getAllCases();
    }

    /**
     * @return TestCase
     */
    protected function getPhpunitTestcase(): TestCase
    {
        return $this;
    }

    /**
     * @param array $structures
     * @return ScalarsSearchModelInterface
     */
    protected function getInitedByStructuresSearchModel(array $structures): ScalarsSearchModelInterface
    {
        return new ScalarModelStub(new StructureCollection($structures));
    }
}