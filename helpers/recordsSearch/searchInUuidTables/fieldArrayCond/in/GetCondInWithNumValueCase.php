<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldArrayCond\in;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

final class GetCondInWithNumValueCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::field('count')->arr('in', ['adda', '21', '400', 123]);
    }

    public function getInitStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', '412','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', '21',null),
            self::build('ab3dae93-fece-4bde-9926-51836f588001', '21','2022-10-11'),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'2002-12-01'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', '123','2008-02-12'),
        ];
    }

    public function getResultStructures(): array
    {
        return [
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', '21',null),
            self::build('ab3dae93-fece-4bde-9926-51836f588001', '21','2022-10-11'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', '123','2008-02-12'),
        ];
    }

    /**
     * @param string $uuid
     * @param string|null $count
     * @param string|null $date
     * @return Structure
     */
    protected static function build(string $uuid, ?string $count, ?string $date): Structure
    {
        return new Structure(['uuid' => $uuid, 'count' => $count, 'date' => $date]);
    }
}