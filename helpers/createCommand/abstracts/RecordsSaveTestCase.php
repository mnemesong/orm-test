<?php

namespace Mnemesong\OrmTestHelpers\createCommand\abstracts;

use Mnemesong\Structure\Structure;

abstract class RecordsSaveTestCase
{
    protected bool $smartSave = false;
    protected array $primaryFields = [];

    /**
     * @return Structure[]
     */
    abstract public function getInitStructures(): array;

    /**
     * @return Structure[]
     */
    abstract public function getResultStructures(): array;

    abstract public function __construct();

    /**
     * @return Structure
     */
    abstract public function getSavingStructure(): Structure;

    /**
     * @return bool
     */
    public function isSmartSave(): bool
    {
        return $this->smartSave;
    }

    /**
     * @return array
     */
    public function getPrimaryFields(): array
    {
        return $this->primaryFields;
    }

}