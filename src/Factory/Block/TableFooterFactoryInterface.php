<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\TableFooter;

interface TableFooterFactoryInterface
{
    public function build(array $data): TableFooter;
}