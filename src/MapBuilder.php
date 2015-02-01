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
        // TODO X,Yの正負が数学の一般的な方向と逆になる
        $map = [];
        foreach ($pointDefinitions as $y => $points) {
            foreach ($points as $x => $number) {
                if (!isset($map[$x])) {
                    $map[$x] = [];
                }
                $map[$x][$y] = $this->pointFactory->create($x, $y, $number);
            }
        }

        return new Map($map);
    }
}
