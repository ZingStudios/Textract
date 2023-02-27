<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\Point;

interface PointFactoryInterface
{
    public function build(array $data): Point;
}
