<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondLessAsStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondMoreValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondNotEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondNotEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondNotMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllMultifieldSortedCase1;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllMultifieldSortedCase2;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllUuidSortedAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllUuidSortedDescCase;

class RecordSearchCasesFacade
{
    /**
     * @return array<RecordsSearchTestCase>
     */
    public static function getAllCases(): array
    {
        return [
            new GetAllCase(),
            new GetAllUuidSortedAscCase(),
            new GetAllUuidSortedDescCase(),
            new GetAllMultifieldSortedCase1(),
            new GetAllMultifieldSortedCase2(),
            new GetAllSpecialFieldsCase(),
            new GetCondEqValueCase(),
            new GetCondNotEqValueCase(),
            new GetCondEqNullValueCase(),
            new GetCondNotEqEmptyValueCase(),
            new GetCondMoreValueCase(),
            new GetCondMoreAsNumValueCase(),
            new GetCondLessAsStrValueCase(),
            new GetCondNotMoreAsNumValueCase(),
        ];
    }
}