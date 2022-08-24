<?php

namespace Mnemesong\OrmTestHelpers\recordsSearch\abstracts;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\Structure\Structure;

abstract class RecordsSearchTestCase
{
    protected array $selectFields = [];
    protected array $sortFields = [];
    protected ?CondInterface $cond = null;
    protected int $limit = 0;

    /**
     * @return Structure[]
     */
    abstract public function getInitStructures(): array;

    /**
     * @return Structure[]
     */
    abstract public function getResultStructures(): array;

    /**
     * @return string[]
     */
    public function getSelectFields(): array
    {
        return $this->selectFields;
    }

    /**
     * @return string[]
     */
    public function getSortFields(): array
    {
        return $this->sortFields;
    }

    /**
     * @return CondInterface|null
     */
    public function getCond(): ?CondInterface
    {
        return $this->cond;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}