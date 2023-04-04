<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\TableTitle;

interface TableTitleFactoryInterface
{
    public function build(array $data): TableTitle;
}