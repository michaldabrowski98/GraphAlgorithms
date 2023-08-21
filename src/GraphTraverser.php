<?php

namespace App\Graph;

use App\Graph\Queue\Queue;
use SplQueue;

class GraphTraverser
{
    public static function depthFirstTraversal(Vertex $start, array $visitedVertices): void
    {
        echo $start->getData() . PHP_EOL;

        foreach ($start->getEdges() as $edge) {
            $neighbour = $edge->getEnd();

            if (!in_array($neighbour, $visitedVertices)) {
                $visitedVertices[] = $neighbour;
                GraphTraverser::depthFirstTraversal($neighbour, $visitedVertices);
            }
        }
    }

    public static function breadthFirstSearch(Vertex $start, array $visitedVertices): void
    {
        $visitQueue = new Queue();
        $visitQueue->enqueue($start);
        while(!$visitQueue->isEmpty()) {
            $current = $visitQueue->dequeue();
            echo $current->getData() . PHP_EOL;

            foreach($current->getEdges() as $edge) {
                $neighbour = $edge->getEnd();
                if (!in_array($neighbour, $visitedVertices)) {
                    $visitedVertices[] = $neighbour;
                    $visitQueue->enqueue($neighbour);
                }
            }
        }
    }
}