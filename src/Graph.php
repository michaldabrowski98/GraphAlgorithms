<?php

namespace App\Graph;

class Graph
{
    /**
     * @var Vertex[]
     */
    private array $vertices = [];
    private bool $isWeighted;
    private bool $isDirected;

    public function __construct(bool $isWeighted, bool $isDirected) {
        $this->isWeighted = $isWeighted;
        $this->isDirected = $isDirected;
    }

    public function addVertex(string $data): Vertex
    {
        $newVertex = new Vertex($data);
        $this->vertices[] = $newVertex;
        return $newVertex;
    }

    public function addEdge(Vertex $vertex1, Vertex $vertex2, ?int $weight): void
    {
        if (!$this->isWeighted) {
            $weight = null;
        }

        $vertex1->addEdge($vertex2, $weight);
        if (!$this->isDirected) {
            $vertex2->addEdge($vertex1, $weight);
        }
    }

    public function removeEdge(Vertex $vertex1, Vertex $vertex2): void
    {
        $vertex1->removeEdge($vertex2);

        if (!$this->isDirected) {
            $vertex2->removeEdge($vertex1);
        }
    }

    public function removeVertex(Vertex $vertex): void
    {
        foreach ($this->vertices as $key => $v) {
            if ($v === $vertex) {
                unset($this->vertices[$key]);
            }
        }
    }

    public function getVertices(): array
    {
        return $this->vertices;
    }

    public function isWeighted(): bool
    {
        return $this->isWeighted;
    }

    public function isDirected(): bool
    {
        return $this->isDirected;
    }

    public function getVertexByValue(string $value): ?Vertex
    {
        foreach ($this->vertices as $vertex) {
            if ($vertex->getData() === $value) {
                return $vertex;
            }
        }

        return null;
    }

    public function print(): void
    {
        foreach ($this->vertices as $vertex) {
            $vertex->print($this->isWeighted);
        }
    }
}