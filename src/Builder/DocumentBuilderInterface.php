<?php

namespace ZingStudios\Textract\Builder;

use ZingStudios\Textract\Model\Document;

interface DocumentBuilderInterface
{
    public function build(array $data): Document;
}
