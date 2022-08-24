<?php

namespace Mnemesong\OrmTestStubs\conds;

use Mnemesong\Fit\conditions\abstracts\CondInterface;

class ConstCond implements CondInterface
{
    protected bool $val;

    /**
     * @param bool $val
     */
    public function __construct(bool $val)
    {
        $this->val = $val;
    }

    /**
     * @return bool
     */
    public function match(): bool
    {
        return $this->val;
    }
}