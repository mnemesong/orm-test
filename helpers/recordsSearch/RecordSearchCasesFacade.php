<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch;

use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldArray\NegatCondInWithNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldArray\NegatCondInWithStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldArray\NegatCondNotInWithNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldArray\NegatCondNotInWithStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldUnary\NegatCondNotNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldUnary\NegatCondNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldValueCond\NegatCondEqNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldValueCond\NegatCondEqValueLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldValueCond\NegatCondEqWithSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldValueCond\NegatCondLessAsNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldValueCond\NegatCondLessValueSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\in\GetCondInWithEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\in\GetCondInWithNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\in\GetCondInWithNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\in\GetCondInWithStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\in\GetCondInWithStrValueSortedAndLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\notIn\GetCondNotInWithEmptyValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\notIn\GetCondNotInWithNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\notIn\GetCondNotInWithNumValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\notIn\GetCondNotInWithStrValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\notIn\GetCondNotInWithStrValueSortedAndLimitedCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldUnaryCond\null\GetCondNotNullValueCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldUnaryCond\null\GetCondNullValueCase;
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
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\eq\GetCondEqWithSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\less\GetCondLessStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\lessOrEq\GetCondLessOrEqStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\more\GetCondMoreStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq\GetCondMoreOrEqStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notEq\GetCondNotEqStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notLess\GetCondNotLessStringOnlyCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreAsNumCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreAsStrCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreLimitCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreSortingAscCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreSortingDescCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreSpecialFieldsCase;
use Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\notMore\GetCondNotMoreStringOnlyCase;
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
            //===FieldWithValue===
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

            //===FieldWithField===
            //fieldFieldEq
            new GetCondEqAsNumCase(),
            new GetCondEqAsStrCase(),
            new GetCondEqLimitCase(),
            new GetCondEqSortingAscCase(),
            new GetCondEqSortingDescCase(),
            new GetCondEqStringOnlyCase(),
            new GetCondEqWithSpecialFieldsCase(),

            //fieldFieldLess
            new GetCondLessAsNumCase(),
            new GetCondLessAsStrCase(),
            new GetCondLessLimitCase(),
            new GetCondLessSortingAscCase(),
            new GetCondLessSortingDescCase(),
            new GetCondLessSpecialFieldsCase(),
            new GetCondLessStringOnlyCase(),

            //fieldFieldLessOrEq
            new GetCondLessOrEqAsNumCase(),
            new GetCondLessOrEqAsStrCase(),
            new GetCondLessOrEqLimitCase(),
            new GetCondLessOrEqSortingAscCase(),
            new GetCondLessOrEqSortingDescCase(),
            new GetCondLessOrEqSpecialFieldsCase(),
            new GetCondLessOrEqStringOnlyCase(),

            //fieldFieldMore
            new GetCondMoreAsNumCase(),
            new GetCondMoreAsStrCase(),
            new GetCondMoreLimitCase(),
            new GetCondMoreSortingAscCase(),
            new GetCondMoreSortingDescCase(),
            new GetCondMoreSpecialFieldsCase(),
            new GetCondMoreStringOnlyCase(),

            //fieldFieldMoreOrEq
            new GetCondMoreOrEqAsNumCase(),
            new GetCondMoreOrEqAsStrCase(),
            new GetCondMoreOrEqLimitCase(),
            new GetCondMoreOrEqSortingAscCase(),
            new GetCondMoreOrEqSortingDescCase(),
            new GetCondMoreOrEqSpecialFieldsCase(),
            new GetCondMoreOrEqStringOnlyCase(),

            //fieldFieldNotEq
            new GetCondNotEqAsNumCase(),
            new GetCondNotEqAsStrCase(),
            new GetCondNotEqLimitCase(),
            new GetCondNotEqSortingAscCase(),
            new GetCondNotEqSortingDescCase(),
            new GetCondNotEqSpecialFieldsCase(),
            new GetCondNotEqStringOnlyCase(),

            //fieldFieldNotLess
            new GetCondNotLessAsNumCase(),
            new GetCondNotLessAsStrCase(),
            new GetCondNotLessLimitCase(),
            new GetCondNotLessSortingAscCase(),
            new GetCondNotLessSortingDescCase(),
            new GetCondNotLessSpecialFieldsCase(),
            new GetCondNotLessStringOnlyCase(),

            //fieldFieldNotMore
            new GetCondNotMoreAsNumCase(),
            new GetCondNotMoreAsStrCase(),
            new GetCondNotMoreLimitCase(),
            new GetCondNotMoreSortingAscCase(),
            new GetCondNotMoreSortingDescCase(),
            new GetCondNotMoreSpecialFieldsCase(),
            new GetCondNotMoreStringOnlyCase(),

            //===field-with-array===
            //fieldArrayIn
            new GetCondInWithEmptyValueCase(),
            new GetCondInWithNullValueCase(),
            new GetCondInWithNumValueCase(),
            new GetCondInWithStrValueCase(),
            new GetCondInWithStrValueSortedAndLimitedCase(),

            //fieldArrayIn
            new GetCondNotInWithEmptyValueCase(),
            new GetCondNotInWithNullValueCase(),
            new GetCondNotInWithNumValueCase(),
            new GetCondNotInWithStrValueCase(),
            new GetCondNotInWithStrValueSortedAndLimitedCase(),

            //===field-null===
            new GetCondNotNullValueCase(),
            new GetCondNullValueCase(),

            //===composite-unary===
            //array
            new NegatCondInWithNullValueCase(),
            new NegatCondInWithStrValueCase(),
            new NegatCondNotInWithNullValueCase(),
            new NegatCondNotInWithStrValueCase(),

            //unary
            new NegatCondNotNullValueCase(),
            new NegatCondNullValueCase(),

            //value
            new NegatCondEqNullValueCase(),
            new NegatCondEqValueLimitedCase(),
            new NegatCondEqWithSortingAscCase(),
            new NegatCondLessAsNumValueCase(),
            new NegatCondLessValueSortingDescCase(),

        ];
    }
}