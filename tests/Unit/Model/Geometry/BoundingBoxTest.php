<?php

namespace ZingStudios\Textract\Tests\Unit\Model\Geometry;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Model\Geometry\BoundingBox;
use ZingStudios\Textract\Model\Geometry\Point;

/**
 * @covers \ZingStudios\Textract\Model\Geometry\BoundingBox
 */
class BoundingBoxTest extends TestCase
{
    public function testGetDimensions()
    {
        $faker = Factory::create();

        $width = $faker->randomFloat();
        $height = $faker->randomFloat();
        $left = $faker->randomFloat();
        $top = $faker->randomFloat();

        $boundingBox = new BoundingBox(
            $width,
            $height,
            $left,
            $top
        );

        $this->assertEquals($width, $boundingBox->getWidth());
        $this->assertEquals($height, $boundingBox->getHeight());
        $this->assertEquals($left, $boundingBox->getLeft());
        $this->assertEquals($top, $boundingBox->getTop());
    }
}
