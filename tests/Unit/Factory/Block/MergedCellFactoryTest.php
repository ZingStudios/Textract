<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Block;

use Faker\Factory;
use ZingStudios\Textract\Factory\Block\MergedCellFactory;
use ZingStudios\Textract\Factory\Geometry\GeometryFactoryInterface;
use ZingStudios\Textract\Model\Geometry\Geometry;
use ZingStudios\Textract\Tests\AbstractBaseTest;

/**
 * @covers \ZingStudios\Textract\Factory\Block\MergedCellFactory
 * @covers \ZingStudios\Textract\Factory\Block\AbstractBlockFactory
 */
class MergedCellFactoryTest extends AbstractBaseTest
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
        $blockData =
            [
                'Id' => $id,
                'Geometry' => $geometryData,
            ];


        $factory = new MergedCellFactory($geometryFactoryMock);

        $block = $factory->build($blockData);

        $this->assertEquals($id, $block->getId());
        $this->assertSame($geometryStub, $block->getGeometry());
    }
}
