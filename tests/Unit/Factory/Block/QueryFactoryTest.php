<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Block;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Factory\Block\CellFactory;
use ZingStudios\Textract\Factory\Block\KeyValueSetFactory;
use ZingStudios\Textract\Factory\Block\LineFactory;
use ZingStudios\Textract\Factory\Block\MergedCellFactory;
use ZingStudios\Textract\Factory\Block\PageFactory;
use ZingStudios\Textract\Factory\Block\QueryFactory;
use ZingStudios\Textract\Factory\Geometry\BoundingBoxFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\GeometryFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PointFactory;
use ZingStudios\Textract\Factory\Geometry\PointFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PolygonFactory;
use ZingStudios\Textract\Factory\Geometry\PolygonFactoryInterface;
use ZingStudios\Textract\Model\Block\EntityType;
use ZingStudios\Textract\Model\Geometry\BoundingBox;
use ZingStudios\Textract\Model\Geometry\Geometry;
use ZingStudios\Textract\Model\Geometry\Point;
use ZingStudios\Textract\Model\Geometry\Polygon;
use ZingStudios\Textract\Tests\AbstractBaseTest;

/**
 * @covers \ZingStudios\Textract\Factory\Block\QueryFactory
 * @covers \ZingStudios\Textract\Factory\Block\AbstractBlockFactory
 */
class QueryFactoryTest extends AbstractBaseTest
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
        $alias = $faker->word();
        $text = $faker->sentence();

        $blockData =
            [
                'Id' => $id,
                'Geometry' => $geometryData,
                'Alias' => $alias,
                'Text' => $text
            ];


        $factory = new QueryFactory($geometryFactoryMock);

        $block = $factory->build($blockData);

        $this->assertEquals($id, $block->getId());
        $this->assertSame($geometryStub, $block->getGeometry());
        $this->assertSame($alias, $block->getAlias());
        $this->assertSame($text, $block->getText());
    }
}
