<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

final class GetCondNotLessValueCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::field('name')->val('!<', 'James');
    }

    public function getInitStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', 'Will',null),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'2002-12-01'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', 'Mira','2008-02-12'),
            self::build('80e3cdbd-48d4-4109-b84d-3fc5e45ccf93', 'Alex','2012-11-02'),
        ];
    }

    public function getResultStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', 'Will',null),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'2002-12-01'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', 'Mira','2008-02-12'),
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