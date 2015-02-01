<?php


namespace Nagoya\Vol8\Entity;


class Route
{
    /**
     * @var array
     */
    private $points;

    public function __construct(array $points = [])
    {
        $this->points = $points;
    }

    public function add(Point $point)
    {
        $this->points[] = $point;
    }

    public function getHop()
    {
        return count($this->points);
    }
}
