<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Geometry;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Factory\Geometry\PointFactory;

/**
 * @covers \ZingStudios\Textract\Factory\Geometry\PointFactory
 */
class PointFactoryTest extends TestCase
{
    public function testBuild()
    {
        $faker = Factory::create();

        $x = $faker->randomFloat();
        $y = $faker->randomFloat();

        $factory = new PointFactory();

        $boundingBox = $factory->build(
            [
                'X' => $x,
                'Y' => $y,
            ]
        );

        $this->assertEquals($x, $boundingBox->getX());
        $this->assertEquals($y, $boundingBox->getY());
    }
}
