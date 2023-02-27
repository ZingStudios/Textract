<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\KeyValueSet;

interface KeyValueSetFactoryInterface
{
    public function build(array $data): KeyValueSet;
}
