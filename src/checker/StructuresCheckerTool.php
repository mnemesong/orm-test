<?php

namespace Mnemesong\OrmTest\checker;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmTest\exceptions\NotRegistredPoliticException;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class StructuresCheckerTool
{
    protected array $structMatchPolitics = [];
    protected array $compositeMatchPolitics = [];

    /**
     * @param StructureMatchPoliticInterface[] $politics
     * @return $this
     */
    public function withAddStructMatchPolitics(array $politics): self
    {
        Assert::allIsAOf($politics, StructureMatchPoliticInterface::class);
        $clone = clone $this;
        $clone->structMatchPolitics = array_merge($this->structMatchPolitics, $politics);
        $clone->structMatchPolitics = array_values($clone->structMatchPolitics);
        return $clone;
    }

    /**
     * @param CompositeMatchPoliticInterface[] $politics
     * @return $this
     */
    public function withAddCompositeMatchPolitics(array $politics): self
    {
        Assert::allIsAOf($politics, CompositeMatchPoliticInterface::class);
        $clone = clone $this;
        $clone->compositeMatchPolitics = array_merge($this->compositeMatchPolitics, $politics);
        $clone->compositeMatchPolitics = array_values($clone->compositeMatchPolitics);
        return $clone;
    }

    /**
     * @return StructureMatchPoliticInterface[]
     */
    public function getPoliticsArr(): array
    {
        return $this->structMatchPolitics;
    }

    /**
     * @param Structure $structure
     * @param CondInterface $cond
     * @return bool
     * @throws NotRegistredPoliticException
     */
    public function matchStructure(Structure $structure, CondInterface $cond): bool
    {
        $c = get_class($cond);
        foreach ($this->structMatchPolitics as $politic)
        {
            /* @var StructureMatchPoliticInterface $politic */
            if($politic->checkingCondClass() === $c) {
                return $politic->isMatch($structure, $cond);
            }
        }
        foreach ($this->compositeMatchPolitics as $politic)
        {
            /* @var CompositeMatchPoliticInterface $politic */
            if($politic->checkingCondClass() === $c) {
                return $politic->isMatch($structure, $cond, $this);
            }
        }
        throw NotRegistredPoliticException::politic($c);
    }
}