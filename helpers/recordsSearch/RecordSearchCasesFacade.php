<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqWithSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqWithSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondLessAsStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondMoreValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondNotEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondNotEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondNotMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\withoutCond\GetAllLimitedCase;
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
            //withoutCond
            new GetAllCase(),
            new GetAllLimitedCase(),
            new GetAllMultifieldSortedCase1(),
            new GetAllMultifieldSortedCase2(),
            new GetAllSpecialFieldsCase(),
            new GetAllUuidSortedAscCase(),
            new GetAllUuidSortedDescCase(),

            //fieldValueEq
            new GetCondEqNullValueCase(),
            new GetCondEqNullValueCase(),
            new GetCondEqValueCase(),
            new GetCondEqValueLimitedCase(),
            new GetCondEqValueWithSpecialFieldsCase(),
            new GetCondEqWithSortingAscCase(),
            new GetCondEqWithSortingDescCase(),
        ];
    }
}