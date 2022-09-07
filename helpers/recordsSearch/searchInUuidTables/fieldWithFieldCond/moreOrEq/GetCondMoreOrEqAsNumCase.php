<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\searchInUuidTables\fieldWithFieldCond\moreOrEq;

use Mnemesong\Fit\Fit;
use Mnemesong\OrmTestHelpers\recordsSearch\abstracts\RecordsSearchTestCase;
use Mnemesong\Structure\Structure;

class GetCondMoreOrEqAsNumCase extends RecordsSearchTestCase
{
    public function __construct()
    {
        $this->cond = Fit::field('count')->field('>=', 'num')->asNum();
    }

    public function getInitStructures(): array
    {
        return [
            self::build('5145a132-0581-43c2-bd04-77ad6ece3cef', 5, 11),
            self::build('22cd76a4-b59c-4cfb-be05-f8ec8edd5bc4', 12, 4),
            self::build('3adc6a31-d2f6-4c55-8694-ebc21624ebf2', 3, 3),
            self::build('4aebe351-410d-40d9-9bfd-ddbaac0affa8', null, 11),
            self::build('802bc091-6ebb-4b01-acce-0b0177cd07f4', 12, null),
            self::build('653eab00-0072-416f-8e73-22389a2577e1', null, null),
        ];
    }

    public function getResultStructures(): array
    {
        return [
            self::build('22cd76a4-b59c-4cfb-be05-f8ec8edd5bc4', 12, 4),
            self::build('3adc6a31-d2f6-4c55-8694-ebc21624ebf2', 3, 3),
            self::build('653eab00-0072-416f-8e73-22389a2577e1', null, null),
        ];
    }

    /**
     * @param string $uuid
     * @param int|null $count
     * @param int|null $num
     * @return Structure
     */
    protected static function build(string $uuid, ?int $count, ?int $num): Structure
    {
        return new Structure(['uuid' => $uuid, 'count' => $count, 'num' => $num]);
    }
}