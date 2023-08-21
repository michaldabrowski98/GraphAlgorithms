<?php

namespace App\Graph\Queue;

use App\Graph\Vertex;

class Node
{
    public Vertex $data;
    private ?Node $next;
    public function __construct(Vertex $data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function getNextNode(): ?Node
    {
        return $this->next;
    }

    public function setNextNode(?Node $next): void
    {
        $this->next = $next;
    }
}
