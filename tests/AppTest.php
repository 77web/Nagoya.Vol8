<?php

namespace Nagoya\Vol8;

use Nagoya\Vol8\Entity\Factory\PointFactory;
use Nagoya\Vol8\Util\InputParser;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $input
     * @param int $expected
     * @dataProvider provideTestData
     */
    public function test($input, $expected)
    {
        $app = new App(new InputParser(), new MapBuilder(new PointFactory()), new Router());
        $actual = $app->run($input);

        $this->assertEquals($expected, $actual);
    }

    public function provideTestData()
    {
        return [
            ['01224/82925/69076/32298/21065', 6]
        ];
    }
}
