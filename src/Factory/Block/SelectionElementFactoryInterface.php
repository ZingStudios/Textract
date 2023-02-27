<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\SelectionElement;

interface SelectionElementFactoryInterface
{
    public function build(array $data): SelectionElement;
}
