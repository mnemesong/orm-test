<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetAllCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetAllMultifieldSortedCase1;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetAllMultifieldSortedCase2;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetAllSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetAllUuidSortedAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetAllUuidSortedDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondLessAsStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondMoreValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondNotEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondNotEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\GetCondNotMoreAsNumValueCase;

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