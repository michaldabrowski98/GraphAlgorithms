<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Graph\Graph;
use App\Graph\TestGraph;
use App\Graph\GraphTraverser;
use App\Graph\Dijkstra;

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

function dijkstraTest(): void
{
    $testGraph = new Graph(true, true);
    $a = $testGraph->addVertex("A");
    $b = $testGraph->addVertex("B");
    $c = $testGraph->addVertex("C");
    $d = $testGraph->addVertex("D");
    $e = $testGraph->addVertex("E");
    $f = $testGraph->addVertex("F");
    $g = $testGraph->addVertex("G");

    $testGraph->addEdge($a, $c, 100);
    $testGraph->addEdge($a, $b, 3);
    $testGraph->addEdge($a, $d, 4);
    $testGraph->addEdge($d, $c, 3);
    $testGraph->addEdge($d, $e, 8);
    $testGraph->addEdge($e, $b, -2);
    $testGraph->addEdge($e, $f, 10);
    $testGraph->addEdge($b, $g, 9);
    $testGraph->addEdge($e, $g, -50);

    Dijkstra::dijkstraResultPrinter(Dijkstra::dijkstra($testGraph, $a));
    Dijkstra::shortestPathBetween($testGraph, $a, $g);
}

dijkstraTest();