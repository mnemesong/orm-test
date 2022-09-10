<?php

namespace Mnemesong\OrmTestHelpers\scalarSearch\searchInUuidTables\withoutCond;

use Mnemesong\OrmTestHelpers\scalarSearch\abstracts\ScalarSearchTestCase;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;

class ScalarFieldValueNanAsStr extends ScalarSearchTestCase
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->scalars = [
            'avgCount' => new ScalarSpecification('avg', 'date'),
            'avgNull' => new ScalarSpecification('avg', null),
            'countCount' => new ScalarSpecification('count', 'date'),
            'countNull' => new ScalarSpecification('count', null),
            'maxCount' => new ScalarSpecification('max', 'date'),
            'maxNull' => new ScalarSpecification('max', null),
            'minCount' => new ScalarSpecification('min', 'date'),
            'minNull' => new ScalarSpecification('min', null),
            'sumCount' => new ScalarSpecification('sum', 'date'),
            'sumNull' => new ScalarSpecification('sum', null),
            'longCount' => new ScalarSpecification('long', 'date'),
            'longNull' => new ScalarSpecification('long', null),
            'shortCount' => new ScalarSpecification('short', 'date'),
            'shortNull' => new ScalarSpecification('short', null),
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
            self::build('8e998739-c543-44ee-99d5-c1b45af781ce', '412','2022-11-02'),
            self::build('cfcb3398-6037-452f-bff1-4c144d793e51', '33',null),
            self::build('a3030f88-fdf5-4c62-a8ad-aec59d875437', null,'2002-12-01'),
            self::build('92862fb6-8065-4a67-a4c4-ca41fea7da51', '214','2008-02-12'),
        ];
    }

    /**
     * @return Structure
     */
    public function getResultStructure(): Structure
    {
        return  new Structure([
            'avgCount' => null,
            'avgNull' => null,
            'countCount' => 6,
            'countNull' => 8,
            'maxCount' => null,
            'maxNull' => null,
            'minCount' => null,
            'minNull' => null,
            'sumCount' => null,
            'sumNull' => null,
            'longCount' => 10,
            'longNull' => null,
            'shortCount' => 10,
            'shortNull' => null,
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