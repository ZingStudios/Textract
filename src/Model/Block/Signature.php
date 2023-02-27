<?php

namespace ZingStudios\Textract\Model\Block;

class Signature extends AbstractBlock
{
    public function getBlockType(): BlockType
    {
        return BlockType::SIGNATURE;
    }
}
