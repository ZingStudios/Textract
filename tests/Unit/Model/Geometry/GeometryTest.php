<?php

namespace ZingStudios\Textract\Tests\Unit\Model\Geometry;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Model\Geometry\BoundingBox;
use ZingStudios\Textract\Model\Geometry\Geometry;
use ZingStudios\Textract\Model\Geometry\Polygon;

/**
 * @covers \ZingStudios\Textract\Model\Geometry\Geometry
 */
class GeometryTest extends TestCase
{
    public function testGetDimensions()
    {
        $faker = Factory::create();

        $boundingBoxStub = $this->createStub(BoundingBox::class);
        $polygonStub = $this->createStub(Polygon::class);

        $geometry = new Geometry(
            $boundingBoxStub,
            $polygonStub,
        );

        $this->assertSame($boundingBoxStub, $geometry->getBoundingBox());
        $this->assertSame($polygonStub, $geometry->getPolygon());
    }
}
