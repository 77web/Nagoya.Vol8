<?php


namespace Nagoya\Vol8;


use Nagoya\Vol8\Entity\Factory\PointFactory;

class MapBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function test_build()
    {
        $definitions = [
            [1,2,3], // 1行目
            [1,], // 2行目
        ];

        $factory = new PointFactory();
        $mapBuilder = new MapBuilder($factory);

        $map = $mapBuilder->build($definitions);

        $this->assertInstanceOf('\Nagoya\Vol8\Map', $map);

        $lines = $map->getPoints();
        $this->assertCount(3, $lines);
        $this->assertCount(2, $lines[0]); // 1列目
        $this->assertCount(1, $lines[1]); // 2列目
        $this->assertCount(1, $lines[2]); // 3列目
    }
}
