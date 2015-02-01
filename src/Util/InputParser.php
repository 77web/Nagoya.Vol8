<?php


namespace Nagoya\Vol8\Util;


class InputParser
{
    /**
     * @param $string
     * @return array
     */
    public function parse($string)
    {
        $definitions = [];
        foreach (explode('/', $string) as $line) {
            $definitions[] = str_split($line);
        }

        return $definitions;
    }
}
