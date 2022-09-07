<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\compositeUnary\not\fieldField;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

class NegatCondFieldNotMoreStringOnlyCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::notThat(Fit::field('name')->field('!>', 'nick')->asStr());
    }

    /**
     * @return array|Structure[]
     */
    public function getInitStructures(): array
    {
        return [
            self::build('5145a132-0581-43c2-bd04-77ad6ece3cef', 'Volodya', 'Volz134'),
            self::build('2acfde52-a788-446e-a95a-e3328382cc24', 'Sofie', 'Sofz123'),
            self::build('22cd76a4-b59c-4cfb-be05-f8ec8edd5bc4', 'Marz23', 'Mary'),
            self::build('d1a97cac-b8c8-46a2-b259-7622edda5f0b', 'Jazz23', 'Jakob'),
            self::build('5b9b1cac-d3fb-4fda-b89b-972764f8ea42', 'Bob', 'Bob'),
            self::build('3adc6a31-d2f6-4c55-8694-ebc21624ebf2', 'Simona', ''),
            self::build('db1fcb98-21b4-4098-b918-3f269980da44', '', 'Simon'),
            self::build('3f11c2fb-73ab-49f7-b895-d612e5e458d2', '', ''),
            self::build('4aebe351-410d-40d9-9bfd-ddbaac0affa8', null, 'Elizabeth'),
            self::build('802bc091-6ebb-4b01-acce-0b0177cd07f4', 'George', null),
            self::build('653eab00-0072-416f-8e73-22389a2577e1', null, null),
        ];
    }

    /**
     * @return array|Structure[]
     */
    public function getResultStructures(): array
    {
        return [
            self::build('22cd76a4-b59c-4cfb-be05-f8ec8edd5bc4', 'Marz23', 'Mary'),
            self::build('d1a97cac-b8c8-46a2-b259-7622edda5f0b', 'Jazz23', 'Jakob'),
            self::build('3adc6a31-d2f6-4c55-8694-ebc21624ebf2', 'Simona', ''),
        ];
    }

    /**
     * @param string $uuid
     * @param string|null $name
     * @param string|null $nick
     * @return Structure
     */
    protected static function build(string $uuid, ?string $name, ?string $nick): Structure
    {
        return new Structure(['uuid' => $uuid, 'name' => $name, 'nick' => $nick]);
    }
}