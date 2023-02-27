<?php

namespace ZingStudios\Textract\Model\Block;

class MergedCell extends AbstractBlock
{
    public function getBlockType(): BlockType
    {
        return BlockType::MERGED_CELL;
    }
}
