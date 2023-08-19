<?php

namespace App\Graph;

class Vertex
{
    private string $data;

    /**
     * @var Edge[]
     */
    private array $edges = [];

    public function __construct(string $data) {
        $this->data = $data;
    }

    public function addEdge(Vertex $endVertex, int $weight): void
    {
        $this->edges[] = new Edge($this, $endVertex, $weight);
    }

    public function removeEdge(Vertex $endVertex): void
    {
        foreach ($this->edges as $key => $edge) {
            if ($edge->getEnd() === $endVertex) {
                unset($this->edges[$key]);
            }
        }
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getEdges(): array
    {
        return $this->edges;
    }


}