<?php

namespace ZingStudios\Textract\Model\Block;

class TableFooter extends AbstractBlock
{

    public function getBlockType(): BlockType
    {
        return Blocktype::TABLE_FOOTER;
    }
}