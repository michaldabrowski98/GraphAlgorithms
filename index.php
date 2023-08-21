<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Graph\TestGraph;
use App\Graph\GraphTraverser;

function main(): void
{
    $test = new TestGraph();
    $startingVertex = $test->getStartingVertex();
    $visitedVertices = [];
    $visitedVertices[] = $startingVertex;
    echo "DFS" . PHP_EOL;
    GraphTraverser::depthFirstTraversal($startingVertex, $visitedVertices);
    echo "BFS" . PHP_EOL;
    GraphTraverser::breadthFirstSearch($startingVertex, $visitedVertices);

}

main();