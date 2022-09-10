<?php

namespace Mnemesong\OrmTestHelpers\scalarSearch\searchInUuidTables\withoutCond;

use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;

class ScalarFieldValueNanAsNum extends ScalarSearchTestCase
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->scalars = [
            'avgCount' => new ScalarSpecification('avg', 'count'),
            'avgNull' => new ScalarSpecification('avg', null),
            'countCount' => new ScalarSpecification('count', 'count'),
            'countNull' => new ScalarSpecification('count', null),
            'maxCount' => new ScalarSpecification('max', 'count'),
            'maxNull' => new ScalarSpecification('max', null),
            'minCount' => new ScalarSpecification('min', 'count'),
            'minNull' => new ScalarSpecification('min', null),
            'sumCount' => new ScalarSpecification('sum', 'count'),
            'sumNull' => new ScalarSpecification('sum', null),
        ];
    }

    /**
     * @return array|Structure[]
     */
    public function getInitStructures(): array
    {
        return [
            self::build('591d9116-a7b2-42d7-b8aa-2010393cf28a', '412','2022-11-02'),
            self::build('fea7e479-47e4-4b54-9cdf-482e7ab6d8de', '21',null),
            self::build('27ba8450-ce97-4453-bf1b-f547ed339595', null,'2002-12-01'),
            self::build('42e8413e-45c3-44c8-a1fe-1466bc876fc5', '123','2008-02-12'),
        ];
    }

    /**
     * @return Structure
     */
    public function getResultStructure(): Structure
    {
        return  new Structure([
            'avgCount' => 556 / 3,
            'avgNull' => null,
            'countCount' => 3,
            'countNull' => 4,
            'maxCount' => 412,
            'maxNull' => null,
            'minCount' => 21,
            'minNull' => null,
            'sumCount' => 556,
            'sumNull' => null,
        ]);
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