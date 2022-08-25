<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqWithSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqWithSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\GetCondMoreValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqWithSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqWithSortingDescCase;
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

            //fieldValueNotEq
            new GetCondNotEqEmptyValueCase(),
            new GetCondNotEqNullValueCase(),
            new GetCondNotEqValueCase(),
            new GetCondNotEqValueLimitedCase(),
            new GetCondNotEqValueWithSpecialFieldsCase(),
            new GetCondNotEqWithSortingAscCase(),
            new GetCondNotEqWithSortingDescCase(),

            //fieldValueMore
            new GetCondMoreEmptyValueCase(),
            new GetCondMoreNullValueCase(),
            new GetCondMoreValueCase(),
            new GetCondMoreValueLimitedCase(),
            new GetCondMoreValueSortingAscCase(),
            new GetCondMoreValueSortingDescCase(),
            new GetCondMoreValueWithSpecialFieldsCase(),
        ];
    }
}