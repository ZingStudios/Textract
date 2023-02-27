<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Model\Block\Signature;

interface SignatureFactoryInterface
{
    public function build(array $data): Signature;
}
