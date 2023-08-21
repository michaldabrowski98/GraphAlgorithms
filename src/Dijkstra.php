<?php

namespace App\Graph;

use App\Graph\PriorityQueue\PriorityQueue;

class Dijkstra
{
    public static function dijkstra(Graph $g, Vertex $startingVertex): array
    {
        $distances = [];
        $previous = [];

        $queue = new PriorityQueue();
        $queue->add($startingVertex, 0);

        foreach ($g->getVertices() as $vertex) {
            if ($vertex !== $startingVertex) {
                $distances[$vertex->getData()] = PHP_INT_MAX;
            }
            $previous[$vertex->getData()] = new Vertex("Null");
        }

        $distances[$startingVertex->getData()] = 0;

        while (0 !== $queue->size + 1) {
            $current = $queue->poll()->data;
            foreach ($current->getEdges() as $edge) {
                $alternative = $distances[$current->getData()] + $edge->getWeight();
                $neighbourValue = $edge->getEnd()->getData();
                if ($alternative < $distances[$neighbourValue]) {
                    $distances[$neighbourValue] = $alternative;
                    $previous[$neighbourValue] = $current;
                    $queue->add($edge->getEnd(), $distances[$neighbourValue]);
                }
            }
        }

        return ['distances' => $distances, 'previous' => $previous];
    }

    public static function shortestPathBetween(
        Graph $g,
        Vertex $startingVertex,
        Vertex $targetVertex
    ): void {
        $dijkstraDictionaries = self::dijkstra($g, $startingVertex);
        $distances = $dijkstraDictionaries['distances'];
        $previous = $dijkstraDictionaries['previous'];

        $distance = $distances[$targetVertex->getData()];
        echo sprintf(
            "Shortest Distance between %s and %s: %s%s",
            $startingVertex->getData(),
            $targetVertex->getData(),
            $distance,
            PHP_EOL
        );

        $path = [];
        $v = $targetVertex;

        while ($v->getData() !== "Null") {
            $path[] = $v;
            $v = $previous[$v->getData()];
        }

        echo "Shortest path" . PHP_EOL;
        /** @var Vertex $pathVertex */
        foreach ($path as $pathVertex) {
            echo $pathVertex->getData() . PHP_EOL;
        }
    }

    public static function dijkstraResultPrinter(array $d): void
    {
        echo "Distances" . PHP_EOL;
        $distances = $d['distances'];
        foreach ($distances as $key => $distance) {
            echo $key . " : " .$distance . PHP_EOL;
        }

        echo PHP_EOL . "Previous" . PHP_EOL;
        $previous = $d['previous'];
        foreach ($previous as $key => $p) {
            echo $key . " : " . $p->getData() . PHP_EOL;
        }
    }
}
