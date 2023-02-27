<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\Point;

class PointFactory implements PointFactoryInterface
{
    public function build(array $data): Point
    {
        return new Point(
            (float)$data['X'],
            (float)$data['Y'],
        );
    }
}
