<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Word;

interface WordFactoryInterface
{
    public function build(array $data): Word;
}
