<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Block;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Factory\Block\CellFactory;
use ZingStudios\Textract\Factory\Block\KeyValueSetFactory;
use ZingStudios\Textract\Factory\Block\SelectionElementFactory;
use ZingStudios\Textract\Factory\Geometry\BoundingBoxFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\GeometryFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PointFactory;
use ZingStudios\Textract\Factory\Geometry\PointFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PolygonFactory;
use ZingStudios\Textract\Factory\Geometry\PolygonFactoryInterface;
use ZingStudios\Textract\Model\Block\EntityType;
use ZingStudios\Textract\Model\Block\SelectionStatus;
use ZingStudios\Textract\Model\Geometry\BoundingBox;
use ZingStudios\Textract\Model\Geometry\Geometry;
use ZingStudios\Textract\Model\Geometry\Point;
use ZingStudios\Textract\Model\Geometry\Polygon;
use ZingStudios\Textract\Tests\AbstractBaseTest;

/**
 * @covers \ZingStudios\Textract\Factory\Block\SelectionElementFactory
 * @covers \ZingStudios\Textract\Factory\Block\AbstractBlockFactory
 */
class SelectionElementFactoryTest extends AbstractBaseTest
{
    /**
     * @param SelectionStatus $selectionStatus
     * @return void
     * @dataProvider selectionElementProvider
     */
    public function testBuild(SelectionStatus $selectionStatus)
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

        $blockData =
            [
                'Id' => $id,
                'Geometry' => $geometryData,
                'Confidence' => $confidence,
                'SelectionStatus' => $selectionStatus->value,
            ];


        $factory = new SelectionElementFactory($geometryFactoryMock);

        $block = $factory->build($blockData);

        $this->assertEquals($id, $block->getId());
        $this->assertSame($geometryStub, $block->getGeometry());
        $this->assertEquals($confidence, $block->getConfidence());
        $this->assertEquals($selectionStatus, $block->getSelectionStatus());
    }
    
    public function selectionElementProvider(): array
    {
        return [
            [SelectionStatus::SELECTED],
            [SelectionStatus::NOT_SELECTED],
        ];
    }
}
