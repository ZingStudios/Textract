<?php

namespace ZingStudios\Textract\Model\Block;

use ZingStudios\Textract\Model\Geometry\Geometry;

class QueryResult extends AbstractBlock
{
    private string $alias;

    public function __construct(
        string $id,
        Geometry $geometry,
        string $alias
    ) {
        parent::__construct($id, $geometry);
        $this->alias = $alias;
    }

    public function getBlockType(): BlockType
    {
        return BlockType::QUERY_RESULT;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }
}
