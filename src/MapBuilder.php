<?php


namespace Nagoya\Vol8;

use Nagoya\Vol8\Entity\Factory\PointFactory;

class MapBuilder
{
    /**
     * @var PointFactory
     */
    private $pointFactory;

    public function __construct(PointFactory $factory)
    {
        $this->pointFactory = $factory;
    }

    /**
     * @param array $pointDefinitions
     * @return Map
     */
    public function build(array $pointDefinitions)
    {
        // TODO X,Yの方向が数学の一般的な方向と逆になる
        $map = [];
        foreach ($pointDefinitions as $x => $points) {
            $map[$x] = [];
            foreach ($points as $y => $number) {
                $map[$x][$y] = $this->pointFactory->create($x, $y, $number);
            }
        }

        return new Map($map);
    }
}
