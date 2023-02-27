<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\BoundingBox;

interface BoundingBoxFactoryInterface
{
    public function build(array $data): BoundingBox;
}
