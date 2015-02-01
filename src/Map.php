<?php


namespace Nagoya\Vol8;


use Nagoya\Vol8\Entity\Point;

class Map
{
    /**
     * @var array|Entity\Point[]
     */
    private $points;

    /**
     * @param Point[] $points
     */
    public function __construct(array $points)
    {
        $this->points = $points;
    }

    /**
     * @return array|Entity\Point[]
     */
    public function getPoints()
    {
        return $this->points;
    }
}
