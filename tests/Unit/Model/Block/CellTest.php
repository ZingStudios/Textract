<?php

namespace ZingStudios\Textract\Tests\Unit\Model\Block;

use Faker\Factory;
use ZingStudios\Textract\Model\Block\BlockType;
use ZingStudios\Textract\Model\Block\Cell;
use ZingStudios\Textract\Model\Block\RelationshipType;
use ZingStudios\Textract\Model\Geometry\Geometry;

/**
 * @covers \ZingStudios\Textract\Model\Block\Cell
 * @covers \ZingStudios\Textract\Model\Block\AbstractBlock
 */
class CellTest extends AbstractBlockTest
{
    public function testGetters()
    {
        $faker = Factory::create();

        $id = $faker->uuid();
        $geometryStub = $this->createStub(Geometry::class);
        $confidence = $faker->randomFloat();
        $rowIndex = $faker->randomNumber();
        $columnIndex = $faker->randomNumber();
        $rowSpan = $faker->randomNumber();
        $columnSpan = $faker->randomNumber();

        $cell = new Cell(
            $id,
            $geometryStub,
            $confidence,
            $rowIndex,
            $columnIndex,
            $rowSpan,
            $columnSpan
        );

        $this->assertEquals($id, $cell->getId());
        $this->assertEquals($geometryStub, $cell->getGeometry());
        $this->assertEquals($confidence, $cell->getConfidence());
        $this->assertEquals($rowIndex, $cell->getRowIndex());
        $this->assertEquals($columnIndex, $cell->getColumnIndex());
        $this->assertEquals($rowSpan, $cell->getRowSpan());
        $this->assertEquals($columnSpan, $cell->getColumnSpan());
    }

    public function testGetBlockType()
    {
        $faker = Factory::create();

        $cell = new Cell(
            $faker->uuid(),
            $this->createStub(Geometry::class),
            $faker->randomFloat(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            $faker->randomNumber()
        );

        $this->assertEquals(BlockType::CELL, $cell->getBlockType());
    }

    /**
     * @dataProvider relationshipProvider
     */
    public function testAddGetChild(RelationshipType $relationshipType, $childBlock)
    {
        $faker = Factory::create();

        $cell = new Cell(
            $faker->uuid(),
            $this->createStub(Geometry::class),
            $faker->randomFloat(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            $faker->randomNumber()
        );

        $cell->addChild($relationshipType, $childBlock);

        $this->assertCount(1, $cell->getChildren($relationshipType));
        $this->assertSame($childBlock, $cell->getChildren($relationshipType)[0]);
    }

    /**
     * @dataProvider relationshipProvider
     */
    public function testAddGetParent(RelationshipType $relationshipType, $childBlock)
    {
        $faker = Factory::create();

        $cell = new Cell(
            $faker->uuid(),
            $this->createStub(Geometry::class),
            $faker->randomFloat(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            $faker->randomNumber()
        );

        $cell->addParent($relationshipType, $childBlock);

        $this->assertCount(1, $cell->getParents($relationshipType));
        $this->assertSame($childBlock, $cell->getParents($relationshipType)[0]);
    }
}
