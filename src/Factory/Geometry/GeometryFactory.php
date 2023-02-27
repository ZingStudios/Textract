<?php

namespace ZingStudios\Textract\Factory\Geometry;

use ZingStudios\Textract\Model\Geometry\Geometry;

class GeometryFactory implements GeometryFactoryInterface
{
    private BoundingBoxFactoryInterface $boundingBoxFactory;
    private PolygonFactoryInterface $polygonFactory;

    public function __construct(
        BoundingBoxFactoryInterface $boundingBoxFactory = null,
        PolygonFactoryInterface $polygonFactory = null,
    ) {
        if (is_null($boundingBoxFactory)) {
            $boundingBoxFactory = new BoundingBoxFactory();
        }

        if (is_null($polygonFactory)) {
            $polygonFactory = new PolygonFactory();
        }

        $this->boundingBoxFactory = $boundingBoxFactory;
        $this->polygonFactory = $polygonFactory;
    }

    public function build(array $data): Geometry
    {
        return new Geometry(
            $this->boundingBoxFactory->build($data['BoundingBox']),
            $this->polygonFactory->build($data['Polygon']),
        );
    }
}
