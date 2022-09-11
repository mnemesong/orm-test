<?php

namespace Mnemesong\OrmTestStubs;

use Mnemesong\OrmCore\storages\RecordsSaveModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\OrmTest\collectionManager\CollectionManagerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use Mnemesong\TableSchema\TableSchema;

class RecordSaveModelStub implements RecordsSaveModelInterface
{
    protected StructureCollection $structs;
    protected array $primaryFields;
    protected TableSchema $schema;

    /**
     * @param StructureCollection $structs
     * @param array $primaryFields
     */
    public function __construct(StructureCollection $structs, array $primaryFields)
    {
        $this->structs = $structs;
        $this->primaryFields = $primaryFields;
    }

    /**
     * @param Structure $structure
     * @param bool $smartSave
     * @return void
     * @throws \ErrorException
     */
    public function createRecord(Structure $structure, bool $smartSave): void
    {
        $this->structs = (new CollectionManagerTool(DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked()))
            ->addToCollection($this->structs, $structure, $smartSave, $this->primaryFields);
    }

    /**
     * @param TableSchema $schema
     * @return TableSchemaContainsInterface
     */
    public function withTableSchema(TableSchema $schema): \Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface
    {
        $clone = clone $this;
        $clone->schema = $schema;
        return $clone;
    }

    /**
     * @return TableSchema
     */
    public function getTableSchema(): TableSchema
    {
        return $this->schema;
    }

    /**
     * @return StructureCollection
     */
    public function getStructs(): StructureCollection
    {
        return $this->structs;
    }

}