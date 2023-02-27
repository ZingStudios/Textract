<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Table;

interface TableFactoryInterface
{
    public function build(array $data): Table;
}
