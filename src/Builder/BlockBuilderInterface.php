<?php

namespace ZingStudios\Textract\Builder;

use ZingStudios\Textract\Factory\Block\BlockFactoryInterface;
use ZingStudios\Textract\Model\Block\BlockInterface;
use ZingStudios\Textract\Model\Block\BlockType;

interface BlockBuilderInterface
{
    public function build(array $data): BlockInterface;
    public function setBlockFactory(BlockFactoryInterface $blockFactory, BlockType $blockType): void;
}
