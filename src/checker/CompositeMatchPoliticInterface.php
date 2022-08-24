<?php

namespace Mnemesong\OrmTest\checker;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Structure\Structure;

interface CompositeMatchPoliticInterface
{
    /**
     * @return class-string
     */
    public function checkingCondClass(): string;

    /**
     * @param Structure $struct
     * @param CondInterface $cond
     * @param StructuresCheckerTool $checkerTool
     * @return bool
     */
    public function isMatch(Structure $struct, CondInterface $cond, StructuresCheckerTool $checkerTool): bool;
}