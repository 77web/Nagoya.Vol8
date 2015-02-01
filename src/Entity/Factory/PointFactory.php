<?php


namespace Nagoya\Vol8\Entity\Factory;


use Nagoya\Vol8\Entity\Point;

class PointFactory
{
    public function create($x, $y, $number)
    {
        $point = new Point;
        $point->x = $x;
        $point->y = $y;
        $point->number = $number;

        return $point;
    }
}
