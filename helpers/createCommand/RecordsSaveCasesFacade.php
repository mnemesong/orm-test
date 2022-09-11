<?php

namespace Mnemesong\OrmTestHelpers\createCommand;

use Mnemesong\OrmTestHelpers\createCommand\abstracts\RecordsSaveTestCase;
use Mnemesong\OrmTestHelpers\createCommand\saveUuidTables\InsertUniqRecordToUuidTable;

class RecordsSaveCasesFacade
{
    /**
     * @return array<RecordsSaveTestCase>
     */
    public static function getAllCases(): array
    {
        return [
            new InsertUniqRecordToUuidTable(),
        ];
    }
}