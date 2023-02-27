<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Block;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Factory\Block\CellFactory;
use ZingStudios\Textract\Factory\Geometry\BoundingBoxFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\GeometryFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PointFactory;
use ZingStudios\Textract\Factory\Geometry\PointFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PolygonFactory;
use ZingStudios\Textract\Factory\Geometry\PolygonFactoryInterface;
use ZingStudios\Textract\Model\Geometry\BoundingBox;
use ZingStudios\Textract\Model\Geometry\Geometry;
use ZingStudios\Textract\Model\Geometry\Point;
use ZingStudios\Textract\Model\Geometry\Polygon;
use ZingStudios\Textract\Tests\AbstractBaseTest;

/**
 * @covers \ZingStudios\Textract\Factory\Block\CellFactory
 * @covers \ZingStudios\Textract\Factory\Block\AbstractBlockFactory
 */
class CellFactoryTest extends AbstractBaseTest
{
    public function testBuild()
    {
        $faker = Factory::create();

        $geometryData = $this->createTestGeometryData();

        $geometryStub = $this->createStub(Geometry::class);

        $geometryFactoryMock = $this->createMock(GeometryFactoryInterface::class);
        $geometryFactoryMock->expects($this->once())
            ->method('build')
            ->with($geometryData)
            ->willReturn($geometryStub);

        $id = $faker->uuid();
        $confidence = $faker->randomFloat();
        $rowIndex = $faker->randomNumber();
        $columnIndex = $faker->randomNumber();
        $rowSpan = $faker->randomNumber();
        $columnSpan = $faker->randomNumber();

        $blockData =
            [
                'Id' => $id,
                'Geometry' => $geometryData,
                'Confidence' => $confidence,
                'RowIndex' => $rowIndex,
                'ColumnIndex' => $columnIndex,
                'RowSpan' => $rowSpan,
                'ColumnSpan' => $columnSpan,
            ];


        $factory = new CellFactory($geometryFactoryMock);

        $block = $factory->build($blockData);

        $this->assertEquals($id, $block->getId());
        $this->assertSame($geometryStub, $block->getGeometry());
        $this->assertEquals($confidence, $block->getConfidence());
        $this->assertEquals($rowIndex, $block->getRowIndex());
        $this->assertEquals($columnIndex, $block->getColumnIndex());
        $this->assertEquals($rowSpan, $block->getRowSpan());
        $this->assertEquals($columnSpan, $block->getColumnSpan());
    }
}
