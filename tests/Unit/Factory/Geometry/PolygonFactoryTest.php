<?php

namespace ZingStudios\Textract\Tests\Unit\Factory\Geometry;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use ZingStudios\Textract\Factory\Geometry\PointFactory;
use ZingStudios\Textract\Factory\Geometry\PointFactoryInterface;
use ZingStudios\Textract\Factory\Geometry\PolygonFactory;
use ZingStudios\Textract\Model\Geometry\Point;

/**
 * @covers \ZingStudios\Textract\Factory\Geometry\PolygonFactory
 */
class PolygonFactoryTest extends TestCase
{
    public function testBuild()
    {
        $faker = Factory::create();

        $x = $faker->randomFloat();
        $y = $faker->randomFloat();

        $pointData = [];
        $points = [];

        for ($i = 0; $i <= $faker->randomNumber() + 1; ++$i) {
            $x = $faker->randomFloat();
            $y = $faker->randomFloat();

            $pointData[] = ['X' => $x, 'Y' => $y];
            $points[] = new Point($x, $y);
        }

        $pointFactoryMock = $this->createMock(PointFactoryInterface::class);
        $pointFactoryMock->method('build')
            ->withConsecutive(
                ...array_map(
                    function ($pointDataItem) {
                        return [$pointDataItem];
                    },
                    $pointData
                )
            )
            ->willReturnOnConsecutiveCalls(
                ...$points
            );

        $factory = new PolygonFactory($pointFactoryMock);

        $polygon = $factory->build($pointData);

        $this->assertEquals($points, $polygon->getPoints());
    }
}
