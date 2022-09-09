<?php

namespace Mnemesong\OrmTestHelpers\scalarSearch;

use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

trait ScalarSearchTestCaseCheckerTrait
{
    /**
     * @return ScalarSearchTestCase[]
     */
    abstract protected function getRecordSearchTestCases(): array;

    /**
     * @return TestCase
     */
    abstract protected function getPhpunitTestcase(): TestCase;

    /**
     * @param Structure[] $structures
     * @return ScalarsSearchModelInterface
     */
    abstract protected function getInitedByStructuresSearchModel(array $structures): ScalarsSearchModelInterface;

    /**
     * @return void
     */
    public function testAll(): void
    {
        foreach ($this->getRecordSearchTestCases() as $testCase)
        {
            try {
                $resultStructure = $this
                    ->getInitedByStructuresSearchModel($testCase->getInitStructures())
                    ->findScalars(
                        $testCase->getScalars(),
                        $testCase->getSpec()
                    );
            } catch (\Exception $exception) {
                throw new \RuntimeException('Error while testing ' . get_class($testCase)
                    . ' : ' . $exception->__toString());
            }
            $this->getPhpunitTestcase()->assertEquals($resultStructure, $testCase->getResultStructure());
        }
    }
}