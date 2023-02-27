<?php

namespace ZingStudios\Textract\Factory\Block;

use ZingStudios\Textract\Factory\Geometry\GeometryFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactoryInterface;
use ZingStudios\Textract\Model\Block\BlockInterface;

abstract class AbstractBlockFactory implements BlockFactoryInterface
{
    private GeometryFactoryInterface $geometryFactory;

    public function __construct(GeometryFactoryInterface $geometryFactory = null)
    {
        if (is_null($geometryFactory)) {
            $geometryFactory = new GeometryFactory();
        }

        $this->geometryFactory = $geometryFactory;
    }

    /**
     * @return GeometryFactoryInterface
     */
    protected function getGeometryFactory(): GeometryFactoryInterface
    {
        return $this->geometryFactory;
    }

    abstract public function build(array $data): BlockInterface;
}
