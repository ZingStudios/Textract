<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\QueryResult;

interface QueryResultFactoryInterface
{
    public function build(array $data): QueryResult;
}
