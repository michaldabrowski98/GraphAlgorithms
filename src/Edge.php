<?php

namespace App\Graph;

class Edge
{
    private Vertex $start;
    private Vertex $end;
    private ?int $weight;

    public function __construct(Vertex $start, Vertex $end, ?int $weight)
    {
        $this->start = $start;
        $this->end = $end;
        $this->weight = $weight;
    }

    public function getStart(): Vertex
    {
        return $this->start;
    }

    public function getEnd(): Vertex
    {
        return $this->end;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }
}