<?php


namespace Nagoya\Vol8;

use Nagoya\Vol8\Entity\Point;

class MapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Map
     */
    private $map;

    public function setUp()
    {
        $point1 = $this->createPoint(0, 0, 1);
        $point2 = $this->createPoint(1, 0, 2);
        $point3 = $this->createPoint(2, 0, 3);
        $point4 = $this->createPoint(0, 1, 4);

        // |1|2|3|
        // |4| | |
        $points = [
            [$point1, $point4],
            [$point2],
            [$point3],
        ];

        $this->map = new Map($points);
    }

    public function tearDown()
    {
        $this->map = null;
    }

    /**
     * @param Point $point
     * @param Point $src
     * @param int $expectedNextPoints
     * @dataProvider provideTestData
     */
    public function test_hasNext_getNextPoints($point, $src, $expectedNextPoints)
    {
        $hasNext = $expectedNextPoints > 0;

        $this->assertEquals($hasNext, $this->map->hasNext($point, $src));

        if ($hasNext) {
            $nextPoints = $this->map->getNextPoints($point, $src);

            $this->assertEquals($expectedNextPoints, count($nextPoints));
        }
    }

    public function provideTestData()
    {
        return [
            [$this->createPoint(1, 0, 2), $this->createPoint(0, 0, 1), 1],
            [$this->createPoint(0, 1, 4), $this->createPoint(0, 0, 1), 0],
            [$this->createPoint(0, 0, 1), null, 2],
        ];
    }

    /**
     * @param int $x
     * @param int $y
     * @param int $number
     * @return Point
     */
    private function createPoint($x, $y, $number)
    {
        $point = new Point();
        $point->x = $x;
        $point->y = $y;
        $point->number = $number;

        return $point;
    }
}
