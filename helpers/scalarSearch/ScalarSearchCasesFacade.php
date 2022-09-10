<?php

namespace Mnemesong\OrmTestHelpers\scalarSearch;

use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\OrmTestHelpers\scalarSearch\searchInUuidTables\withoutCond\ScalarFieldValueNanAsNum;

class ScalarSearchCasesFacade
{
    /**
     * @return ScalarSearchTestCase[]
     */
    public static function getAllCases(): array
    {
        return [
            new ScalarFieldValueNanAsNum(),
        ];
    }
}