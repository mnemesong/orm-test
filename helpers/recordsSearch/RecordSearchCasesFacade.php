<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqWithSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq\GetCondEqWithSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessUuidValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\less\GetCondLessValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqUuidValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\lessOrEq\GetCondLessOrEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreUuidValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\more\GetCondMoreValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqUuidValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\moreOrEq\GetCondMoreOrEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqWithSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notEq\GetCondNotEqWithSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessUuidValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess\GetCondNotLessValueWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreUuidValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreValueSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notMore\GetCondNotMoreValueWithSpecialFieldsCase;
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
            new GetCondEqAsNumValueCase(),
            new GetCondEqNullValueCase(),
            new GetCondEqNullValueCase(),
            new GetCondEqValueCase(),
            new GetCondEqValueLimitedCase(),
            new GetCondEqValueWithSpecialFieldsCase(),
            new GetCondEqWithSortingAscCase(),
            new GetCondEqWithSortingDescCase(),

            //fieldValueNotEq
            new GetCondNotEqAsNumValueCase(),
            new GetCondNotEqEmptyValueCase(),
            new GetCondNotEqNullValueCase(),
            new GetCondNotEqValueCase(),
            new GetCondNotEqValueLimitedCase(),
            new GetCondNotEqValueWithSpecialFieldsCase(),
            new GetCondNotEqWithSortingAscCase(),
            new GetCondNotEqWithSortingDescCase(),

            //fieldValueMore
            new GetCondMoreAsNumValueCase(),
            new GetCondMoreEmptyValueCase(),
            new GetCondMoreNullValueCase(),
            new GetCondMoreUuidValueCase(),
            new GetCondMoreUuidValueCase(),
            new GetCondMoreValueLimitedCase(),
            new GetCondMoreValueSortingAscCase(),
            new GetCondMoreValueSortingDescCase(),
            new GetCondMoreValueWithSpecialFieldsCase(),

            //fieldValueMoreOrEq
            new GetCondMoreOrEqAsNumValueCase(),
            new GetCondMoreOrEqEmptyValueCase(),
            new GetCondMoreOrEqNullValueCase(),
            new GetCondMoreOrEqUuidValueCase(),
            new GetCondMoreOrEqValueCase(),
            new GetCondMoreOrEqValueLimitedCase(),
            new GetCondMoreOrEqValueSortingAscCase(),
            new GetCondMoreOrEqValueSortingDescCase(),
            new GetCondMoreOrEqValueWithSpecialFieldsCase(),

            //fieldValueNotMore
            new GetCondNotMoreAsNumValueCase(),
            new GetCondNotMoreEmptyValueCase(),
            new GetCondNotMoreNullValueCase(),
            new GetCondNotMoreUuidValueCase(),
            new GetCondNotMoreValueCase(),
            new GetCondNotMoreValueLimitedCase(),
            new GetCondNotMoreValueSortingAscCase(),
            new GetCondNotMoreValueSortingDescCase(),
            new GetCondNotMoreValueWithSpecialFieldsCase(),

            //fieldValueLess
            new GetCondLessAsNumValueCase(),
            new GetCondLessEmptyValueCase(),
            new GetCondLessNullValueCase(),
            new GetCondLessUuidValueCase(),
            new GetCondLessValueCase(),
            new GetCondLessValueLimitedCase(),
            new GetCondLessValueSortingAscCase(),
            new GetCondLessValueSortingDescCase(),
            new GetCondLessValueWithSpecialFieldsCase(),

            //fieldValueLessOrEq
            new GetCondLessOrEqAsNumValueCase(),
            new GetCondLessOrEqEmptyValueCase(),
            new GetCondLessOrEqNullValueCase(),
            new GetCondLessOrEqUuidValueCase(),
            new GetCondLessOrEqValueCase(),
            new GetCondLessOrEqValueLimitedCase(),
            new GetCondLessOrEqValueSortingAscCase(),
            new GetCondLessOrEqValueSortingDescCase(),
            new GetCondLessOrEqValueWithSpecialFieldsCase(),

            //fieldValueNotLess
            new GetCondNotLessAsNumValueCase(),
            new GetCondNotLessEmptyValueCase(),
            new GetCondNotLessNullValueCase(),
            new GetCondNotLessUuidValueCase(),
            new GetCondNotLessValueCase(),
            new GetCondNotLessValueLimitedCase(),
            new GetCondNotLessValueSortingAscCase(),
            new GetCondNotLessValueSortingDescCase(),
            new GetCondNotLessValueWithSpecialFieldsCase(),
        ];
    }
}