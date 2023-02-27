<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Geometry;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Factory\Geometry\BoundingBoxFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\GeometryFactory;
use ZingStudios\Textract\Factory\Geometry\PointFactory;
use ZingStudios\Textract\Factory\Geometry\PointFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PolygonFactory;
use ZingStudios\Textract\Factory\Geometry\PolygonFactoryInterface;
use ZingStudios\Textract\Model\Geometry\BoundingBox;
use ZingStudios\Textract\Model\Geometry\Point;
use ZingStudios\Textract\Model\Geometry\Polygon;

/**
 * @covers \ZingStudios\Textract\Factory\Geometry\GeometryFactory
 */
class GeometryFactoryTest extends TestCase
{
    public function testBuild()
    {
        $faker = Factory::create();

        $boundingBoxData = [
                'Width' => $faker->randomFloat(),
                'Height' => $faker->randomFloat(),
                'Left' => $faker->randomFloat(),
                'Top' => $faker->randomFloat()
        ];

        $polygonData = [
            [
                'X' => $faker->randomFloat(),
                'Y' => $faker->randomFloat(),
            ],
            [
                'X' => $faker->randomFloat(),
                'Y' => $faker->randomFloat(),
            ],
        ];

        $geometryData = [
            'BoundingBox' => $boundingBoxData,
            'Polygon' => $polygonData
        ];

        $boundingBox = new BoundingBox(
            $faker->randomFloat(),
            $faker->randomFloat(),
            $faker->randomFloat(),
            $faker->randomFloat()
        );


        $polygon = new Polygon(
            []
        );

        $boundingBoxFactoryMock = $this->createMock(BoundingBoxFactoryInterface::class);
        $boundingBoxFactoryMock->expects($this->once())
            ->method('build')
            ->with($boundingBoxData)
            ->willReturn($boundingBox);

        $polygonFactoryMock = $this->createMock(PolygonFactoryInterface::class);
        $polygonFactoryMock->expects($this->once())
            ->method('build')
            ->with($polygonData)
            ->willReturn($polygon);


        $factory = new GeometryFactory($boundingBoxFactoryMock, $polygonFactoryMock);

        $geometry = $factory->build($geometryData);

        $this->assertSame($boundingBox, $geometry->getBoundingBox());
        $this->assertSame($polygon, $geometry->getPolygon());
    }
}
