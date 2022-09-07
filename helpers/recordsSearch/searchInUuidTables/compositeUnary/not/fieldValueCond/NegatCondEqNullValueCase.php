<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldValueCond;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

final class NegatCondEqNullValueCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::notThat(Fit::field('name')->val('=', null));
    }

    public function getInitStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', 'Will',null),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'2002-12-01'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', 'Mira','2008-02-12'),
        ];
    }

    public function getResultStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', 'Will',null),
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