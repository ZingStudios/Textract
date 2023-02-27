<?php

namespace ZingStudios\Textract\Tests\Unit\Model\Geometry;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Model\Geometry\Point;

/**
 * @covers \ZingStudios\Textract\Model\Geometry\Point
 */
class PointTest extends TestCase
{
    public function testGetCoordinates()
    {
        $faker = Factory::create();

        $x = $faker->randomFloat();
        $y = $faker->randomFloat();

        $point = new Point($x, $y);

        $this->assertEquals($x, $point->getX());
        $this->assertEquals($y, $point->getY());
    }
}
