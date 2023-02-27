<?php

namespace ZingStudios\Textract\Model\Block;

class Table extends AbstractBlock
{
    public function getBlockType(): BlockType
    {
        return BlockType::TABLE;
    }
}
