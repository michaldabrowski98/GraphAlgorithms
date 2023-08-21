<?php

namespace App\Graph;

class TestGraph
{
    private Graph $testGraph;

    public function __construct()
    {
        $this->testGraph = new Graph(false, true);
        $startNode = $this->testGraph->addVertex("v0.0.0");
        $v1 = $this->testGraph->addVertex("v1.0.0");
        $v2 = $this->testGraph->addVertex("v2.0.0");

        $v11 = $this->testGraph->addVertex("v1.1.0");
        $v12 = $this->testGraph->addVertex("v1.2.0");
        $v21 = $this->testGraph->addVertex("v2.1.0");

        $v111 = $this->testGraph->addVertex("v1.1.1");
        $v112 = $this->testGraph->addVertex("v1.1.2");
        $v121 = $this->testGraph->addVertex("v1.2.1");
        $v211 = $this->testGraph->addVertex("v2.1.1");

        $this->testGraph->addEdge($startNode, $v1, null);
        $this->testGraph->addEdge($startNode, $v2, null);

        $this->testGraph->addEdge($v1, $v11, null);
        $this->testGraph->addEdge($v1, $v12, null);
        $this->testGraph->addEdge($v2, $v21, null);

        $this->testGraph->addEdge($v11, $v111, null);
        $this->testGraph->addEdge($v11, $v112, null);
        $this->testGraph->addEdge($v12, $v121, null);
        $this->testGraph->addEdge($v21, $v211, null);

        // cycle
        $this->testGraph->addEdge($v211, $v2, null);
    }

    public function getStartingVertex(): Vertex
    {
        return $this->testGraph->getVertices()[0];
    }
}