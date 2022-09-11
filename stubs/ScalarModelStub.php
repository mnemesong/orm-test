<?php

namespace Mnemesong\OrmTestStubs;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\OrmTest\collectionManager\CollectionManagerTool;
use Mnemesong\OrmTest\DefaultConfiguredCheckedFacade;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use Mnemesong\TableSchema\TableSchema;

class ScalarModelStub implements ScalarsSearchModelInterface
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
     * @param array $scalars
     * @param CondInterface|null $spec
     * @return Structure
     */
    public function findScalars(array $scalars, ?CondInterface $spec): Structure
    {
        $colManager = new CollectionManagerTool(DefaultConfiguredCheckedFacade::getDefaultConfiguredChecked());
        $structs = $colManager->searchInCollection($this->coll, [], [], $spec, 0);
        return $colManager->scalarsInCollection($structs, $scalars);
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
}