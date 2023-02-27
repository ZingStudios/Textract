<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Page;

interface PageFactoryInterface
{
    public function build(array $data): Page;
}
