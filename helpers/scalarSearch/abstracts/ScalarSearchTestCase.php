<?php

namespace Mnemesong\OrmTestHelpers\scalarSearch\abstracts;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;

abstract class ScalarSearchTestCase
{
    /* @var ScalarSpecification[] $scalars */
    protected array $scalars = [];
    protected ?CondInterface $spec = null;

    /**
     * @return Structure[]
     */
    abstract public function getInitStructures(): array;

    /**
     * @return Structure
     */
    abstract public function getResultStructure(): Structure;

    /**
     * @return ScalarSpecification[]
     */
    public function getScalars(): array
    {
        return $this->scalars;
    }

    /**
     * @return CondInterface|null
     */
    public function getSpec(): ?CondInterface
    {
        return $this->spec;
    }
}