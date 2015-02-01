<?php

namespace Nagoya\Vol8;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string|null $input
     * @param int|null $expected
     */
    public function test($input = null, $expected = null)
    {
        $app = new App();
        $actual = $app->run($input);

        $this->assertEquals($expected, $actual);
    }

    public function provideTestData()
    {
        return [];
    }
}
