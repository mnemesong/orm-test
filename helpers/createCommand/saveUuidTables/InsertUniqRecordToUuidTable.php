<?php

namespace Mnemesong\OrmTestHelpers\createCommand\saveUuidTables;

use Mnemesong\OrmTestHelpers\createCommand\abstracts\RecordsSaveTestCase;
use Mnemesong\Structure\Structure;

class InsertUniqRecordToUuidTable extends RecordsSaveTestCase
{
    /**
     * @return Structure[]
     */
    public function getInitStructures(): array
    {
        return [
            $this->build('4fda0f13-6994-46ce-8133-465cfdf1da5e', 15, '2022-11-02'),
            $this->build('85b9d504-e2aa-45b0-83d3-3fac60ff1078', 5, '2021-08-03'),
            $this->build('688ff5cc-e168-43a9-b2d7-b928f8fab56c', 33, '2018-05-13'),
        ];
    }

    /**
     * @return Structure[]
     */
    public function getResultStructures(): array
    {
        return [
            $this->build('4fda0f13-6994-46ce-8133-465cfdf1da5e', 15, '2022-11-02'),
            $this->build('85b9d504-e2aa-45b0-83d3-3fac60ff1078', 5, '2021-08-03'),
            $this->build('688ff5cc-e168-43a9-b2d7-b928f8fab56c', 33, '2018-05-13'),
            $this->build('44bed61f-a319-4b07-afd8-ed620f671971', 20, '2015-08-18'),
        ];
    }

    public function __construct()
    {
        $this->primaryFields = ['uuid'];
    }

    /**
     * @param string $uuid
     * @param int $count
     * @param string $date
     * @return Structure
     */
    public function build(string $uuid, int $count, string $date): Structure
    {
        return new Structure(['uuid' => $uuid, 'count' => $count, 'date' => $date]);
    }

    /**
     * @return Structure
     */
    public function getSavingStructure(): Structure
    {
        return $this->build('44bed61f-a319-4b07-afd8-ed620f671971', 20, '2015-08-18');
    }
}