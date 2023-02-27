<?php

namespace ZingStudios\Textract\Tests\Unit\Model\Block;

use Faker\Factory;
use ZingStudios\Textract\Model\Block\BlockType;
use ZingStudios\Textract\Model\Block\Line;
use ZingStudios\Textract\Model\Block\RelationshipType;
use ZingStudios\Textract\Model\Geometry\Geometry;

/**
 * @covers \ZingStudios\Textract\Model\Block\Line
 * @covers \ZingStudios\Textract\Model\Block\AbstractBlock
 */
class LineTest extends AbstractBlockTest
{
    public function testGetters()
    {
        $faker = Factory::create();

        $id = $faker->uuid();
        $geometryStub = $this->createStub(Geometry::class);
        $confidence = $faker->randomFloat();
        $text = $faker->sentence();

        $cell = new Line(
            $id,
            $geometryStub,
            $confidence,
            $text
        );

        $this->assertEquals($id, $cell->getId());
        $this->assertEquals($geometryStub, $cell->getGeometry());
        $this->assertEquals($confidence, $cell->getConfidence());
        $this->assertEquals($text, $cell->getText());
        $this->assertEquals($text, $cell->getValue());
    }

    public function testGetBlockType()
    {
        $faker = Factory::create();

        $cell = new Line(
            $faker->uuid(),
            $this->createStub(Geometry::class),
            $faker->randomFloat(),
            $faker->sentence()
        );

        $this->assertEquals(BlockType::LINE, $cell->getBlockType());
    }

    /**
     * @dataProvider relationshipProvider
     */
    public function testAddGetChild(RelationshipType $relationshipType, $childBlock)
    {
        $faker = Factory::create();

        $cell = new Line(
            $faker->uuid(),
            $this->createStub(Geometry::class),
            $faker->randomFloat(),
            $faker->sentence()
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

        $cell = new Line(
            $faker->uuid(),
            $this->createStub(Geometry::class),
            $faker->randomFloat(),
            $faker->sentence()
        );

        $cell->addParent($relationshipType, $childBlock);

        $this->assertCount(1, $cell->getParents($relationshipType));
        $this->assertSame($childBlock, $cell->getParents($relationshipType)[0]);
    }
}
