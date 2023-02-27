<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\Geometry;

interface GeometryFactoryInterface
{
    public function build(array $data): Geometry;
}
