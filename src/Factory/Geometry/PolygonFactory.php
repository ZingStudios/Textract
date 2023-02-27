<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\Polygon;

class PolygonFactory implements PolygonFactoryInterface
{
    private PointFactoryInterface $pointFactory;

    public function __construct(PointFactoryInterface $pointFactory = null)
    {
        if (is_null($pointFactory)) {
            $pointFactory = new PointFactory();
        }
        $this->pointFactory = $pointFactory;
    }

    public function build(array $data): Polygon
    {
        $points = [];

        foreach ($data as $pointData) {
            $points[] = $this->pointFactory->build($pointData);
        }

        return new Polygon(
            $points
        );
    }
}
