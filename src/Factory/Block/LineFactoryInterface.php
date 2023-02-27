<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Line;

interface LineFactoryInterface
{
    public function build(array $data): Line;
}
