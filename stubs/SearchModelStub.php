<?php

namespace Mnemesong\OrmTestStubs;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\OrmTest\collectionManager\CollectionManagerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\TableSchema\TableSchema;

class SearchModelStub implements RecordsSearchModelInterface
{
    protected StructureCollection $coll;
    protected TableSchema $schema;

    /**
     * @param StructureCollection $coll
     */
    public function __construct(StructureCollection $coll)
    {
        $this->coll = $coll;
    }

    /**
     * @param array $selectFields
     * @param array $sortFields
     * @param CondInterface|null $cond
     * @param int $limit
     * @return StructureCollection
     * @throws \ErrorException
     */
    public function findRecords(array $selectFields, array $sortFields, ?CondInterface $cond, int $limit): StructureCollection
    {
        $colManager = new CollectionManagerTool(DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked());
        return $colManager->searchInCollection(
            $this->coll,
            $selectFields,
            $sortFields,
            $cond,
            $limit
        );
    }

    /**
     * @param TableSchema $schema
     * @return TableSchemaContainsInterface
     */
    public function withTableSchema(TableSchema $schema): TableSchemaContainsInterface
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
}