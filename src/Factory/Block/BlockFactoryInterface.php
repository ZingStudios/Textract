<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\BlockInterface;

interface BlockFactoryInterface
{
    public function build(array $data): BlockInterface;
}
