<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\BoundingBox;

class BoundingBoxFactory implements BoundingBoxFactoryInterface
{
    public function build(array $data): BoundingBox
    {
        return new BoundingBox(
            (float)$data['Width'],
            (float)$data['Height'],
            (float)$data['Left'],
            (float)$data['Top'],
        );
    }
}
