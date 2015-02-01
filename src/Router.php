<?php


namespace Nagoya\Vol8;


use Nagoya\Vol8\Entity\Point;
use Nagoya\Vol8\Entity\Route;

class Router
{
    public function getMaxHop(Map $map)
    {
        $max = 0;
        foreach ($map->getStartPoints() as $start) {
            $max = max($max, $this->calculateMaxHop($start, $map));
        }

        return $max;
    }

    /**
     * @param Point $start
     * @param Map $map
     * @return int|mixed
     */
    private function calculateMaxHop(Point $start, Map $map)
    {
        $hop = 0;

        if ($map->hasNext($start)) {
            foreach ($this->generateRoutes($start, new Route(), $map) as $route) {
                $hop = max($hop, $route->getHop());
            }
        }

        return $hop;
    }

    /**
     * @param Point $start
     * @param Route $previousRoute
     * @param Map $map
     * @return Route[]
     */
    private function generateRoutes(Point $start, Route $previousRoute, Map $map)
    {
        $cursor = $start;
        $previous = $previousRoute->getLastPoint();

        $previousRoute->add($start);

        $routes = [
            $previousRoute,
        ];
        if ($map->hasNext($cursor)) {
            foreach ($map->getNextPoints($cursor, $previous) as $nextPoint) {
                $routes = array_merge($routes, $this->generateRoutes($nextPoint, clone $previousRoute, $map));
            }
        }

        return $routes;
    }
}
