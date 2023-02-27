<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Query;

interface QueryFactoryInterface
{
    public function build(array $data): Query;
}
