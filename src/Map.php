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

    /**
     * @param Point $point
     * @return bool
     */
    public function hasNext(Point $point)
    {
        return count($this->getNextPoints($point)) > 0;
    }

    /**
     * @param Point $point
     * @return Point[]
     */
    public function getNextPoints(Point $point)
    {
        $expectedNextPoints = [];

        // 上
        $expectedNextPoints[] = [
            'x' => $point->x,
            'y' => $point->y - 1,
        ];
        // 左
        $expectedNextPoints[] = [
            'x' => $point->x - 1,
            'y' => $point->y,
        ];
        // 右
        $expectedNextPoints[] = [
            'x' => $point->x + 1,
            'y' => $point->y,
        ];
        // 下
        $expectedNextPoints[] = [
            'x' => $point->x,
            'y' => $point->y + 1,
        ];
        $nextPoints = [];
        foreach ($expectedNextPoints as $nextPoint) {
            if ($this->pointExists($nextPoint['x'], $nextPoint['y'])) {
                $next = $this->points[$nextPoint['x']][$nextPoint['y']];
                if ($next->number > $point->number) {
                    $nextPoints[] = $next;
                }
            }
        }

        return $nextPoints;
    }

    private function pointExists($x, $y)
    {
        return isset($this->points[$x][$y]);
    }

    /**
     * @return Point[]
     */
    public function getStartPoints()
    {
        $starts = [];
        foreach ($this->points as $line) {
            foreach ($line as $point) {
                if ($this->hasNext($point, null)) {
                    $starts[] = $point;
                }
            }
        }

        return $starts;
    }
}
