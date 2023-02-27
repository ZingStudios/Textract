<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\Polygon;

interface PolygonFactoryInterface
{
    public function build(array $data): Polygon;
}
