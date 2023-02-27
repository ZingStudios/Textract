<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Cell;

interface CellFactoryInterface
{
    public function build(array $data): Cell;
}
