<?php

namespace Mnemesong\OrmTest\checker;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmTest\exceptions\NotRegistredPoliticException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class StructuresCheckerTool
{
    protected array $matchPolitics = [];

    /**
     * @param StructureMatchPoliticInterface[] $politics
     * @return $this
     */
    public function withAddMatchPolitics(array $politics): self
    {
        Assert::allIsAOf($politics, StructureMatchPoliticInterface::class);
        $clone = clone $this;
        $clone->matchPolitics = array_merge($this->matchPolitics, $politics);
        $clone->matchPolitics = array_values($clone->matchPolitics);
        return $clone;
    }

    /**
     * @return StructureMatchPoliticInterface[]
     */
    public function getPoliticsArr(): array
    {
        return $this->matchPolitics;
    }

    /**
     * @param Structure $structure
     * @param CondInterface $cond
     * @return bool
     */
    public function matchStructure(Structure $structure, CondInterface $cond): bool
    {
        $c = get_class($cond);
        foreach ($this->matchPolitics as $politic)
        {
            /* @var StructureMatchPoliticInterface $politic */
            if($politic->checkingCondClass() === $c) {
                return $politic->isMatch($structure, $cond);
            }
        }
        throw NotRegistredPoliticException::politic($c);
    }
}