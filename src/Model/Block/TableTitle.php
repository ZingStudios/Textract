<?php

namespace ZingStudios\Textract\Model\Block;

use ZingStudios\Textract\Model\Block;

class TableTitle extends Block\AbstractBlock
{

    public function getBlockType(): BlockType
    {
        return BlockType::TABLE_TITLE;
    }
}