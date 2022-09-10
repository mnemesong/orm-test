<?php

namespace Mnemesong\OrmTestHelpers\scalarSearch;

use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\OrmTestHelpers\scalarSearch\searchInUuidTables\withoutCond\ScalarFieldValueNanAsNum;
use Mnemesong\OrmTestHelpers\scalarSearch\searchInUuidTables\withoutCond\ScalarFieldValueNanAsStr;

class ScalarSearchCasesFacade
{
    /**
     * @return ScalarSearchTestCase[]
     */
    public static function getAllCases(): array
    {
        return [
            new ScalarFieldValueNanAsNum(),
            new ScalarFieldValueNanAsStr(),
        ];
    }
}