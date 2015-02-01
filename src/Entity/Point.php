<?php


namespace Nagoya\Vol8\Entity;


class Point
{
    public $x;

    public $y;

    public $number;

    public function equals(Point $target)
    {
        return $target->x === $this->x && $target->y === $this->y;
    }
}
