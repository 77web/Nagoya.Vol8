<?php
/**
 * This file is part of the Nagoya.Doukaku
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Nagoya\Vol8;

use Nagoya\Vol8\Util\InputParser;

class App
{
    /**
     * @var InputParser
     */
    private $inputParser;

    /**
     * @var MapBuilder
     */
    private $mapBuilder;

    /**
     * @var Router
     */
    private $router;

    public function __construct(InputParser $inputParser, MapBuilder $mapBuilder, Router $router)
    {
        $this->inputParser = $inputParser;
        $this->mapBuilder = $mapBuilder;
        $this->router = $router;
    }

    /**
     * @param string $input
     * @return int
     */
    public function run($input)
    {
        // 点の定義を二次元配列に分割する
        $points = $this->inputParser->parse($input);

        // 点の定義をPointのマップに変換する
        $map = $this->mapBuilder->build($points);


        // ルーターに調べさせる
        $maxHop = $this->router->getMaxHop($map);

        return $maxHop;
    }
}
