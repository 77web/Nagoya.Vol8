<?php


namespace Nagoya\Vol8\Util;


class InputParserTest extends \PHPUnit_Framework_TestCase 
{
    public function test_parse()
    {
        $input = '123/456';
        $expect = [
            [1, 2, 3],
            [4, 5, 6],
        ];

        $parser = new InputParser();
        $this->assertEquals($expect, $parser->parse($input));
    }
}
