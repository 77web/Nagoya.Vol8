<?php


namespace Nagoya\Vol8;

use Nagoya\Vol8\Entity\Point;


class RouterTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * @param int $expectedHop
     * @param Map $map
     * @dataProvider provideTestData
     */
    public function test_getMaxHop($expectedHop, Map $map)
    {
        $router = new Router();

        $this->assertEquals($expectedHop, $router->getMaxHop($map));
    }

    public function provideTestData()
    {
        // |1|1|
        // |2| |
        $map1 = new Map([
            [$this->createPoint(0, 0, 1), $this->createPoint(0, 1, 2)],
            [$this->createPoint(1, 0, 1)],
        ]);
        // |1|2|
        // |0| |
        $map2 = new Map([
            [$this->createPoint(0, 0, 1), $this->createPoint(0, 1, 0)],
            [$this->createPoint(1, 0, 2)],
        ]);

        return [
            [1, $map1],
            [2, $map2],
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
