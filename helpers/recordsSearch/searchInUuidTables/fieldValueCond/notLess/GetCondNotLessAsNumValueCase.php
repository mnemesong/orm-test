<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldValueCond\notLess;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

final class GetCondNotLessAsNumValueCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::field('num')->val('!<', '20')->asNum();
        $this->selectFields = ['num'];
    }

    public function getInitStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', 'James','125'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', 'Will',null),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'11'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', 'Mira','2'),
        ];
    }

    public function getResultStructures(): array
    {
        return [
            self::buildShort('125'),
            self::buildShort(null),
        ];
    }

    /**
     * @param string $uuid
     * @param string|null $name
     * @param string|null $num
     * @return Structure
     */
    protected static function build(string $uuid, ?string $name, ?string $num): Structure
    {
        return new Structure(['uuid' => $uuid, 'name' => $name, 'num' => $num]);
    }

    protected static function buildShort(?string $num): Structure
    {
        return new Structure(['num' => $num]);
    }
}