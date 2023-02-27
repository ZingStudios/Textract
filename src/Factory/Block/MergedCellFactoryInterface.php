<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\MergedCell;

interface MergedCellFactoryInterface
{
    public function build(array $data): MergedCell;
}
