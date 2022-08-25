<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\eq;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

final class GetCondEqWithSortingAscCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::field('name')->val('=', 'James');
        $this->sortFields = ['date' => 'asc'];
    }

    public function getInitStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', 'Will',null),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'2002-12-01'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', 'Mira','2008-02-12'),
            self::build('a21b4808-7525-48f4-b833-5727a1089e53', 'James','2032-05-12'),
            self::build('7a5b488c-e8f3-4c9c-98ca-26a12281f19d', 'James',null),
            self::build('d1dec5ef-0728-4060-9e11-be152dc621e9', 'James','2011-02-02'),
        ];
    }

    public function getResultStructures(): array
    {
        return [
            self::build('7a5b488c-e8f3-4c9c-98ca-26a12281f19d', 'James',null),
            self::build('d1dec5ef-0728-4060-9e11-be152dc621e9', 'James','2011-02-02'),
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','2022-11-02'),
            self::build('a21b4808-7525-48f4-b833-5727a1089e53', 'James','2032-05-12'),
        ];
    }

    /**
     * @param string $uuid
     * @param string|null $name
     * @param string|null $date
     * @return Structure
     */
    protected static function build(string $uuid, ?string $name, ?string $date): Structure
    {
        return new Structure(['uuid' => $uuid, 'name' => $name, 'date' => $date]);
    }
}