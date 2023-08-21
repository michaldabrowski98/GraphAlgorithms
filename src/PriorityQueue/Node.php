<?php

namespace App\Graph\PriorityQueue;

use App\Graph\Queue\Node as BaseNode;
use App\Graph\Vertex;

class Node extends BaseNode
{
    public int $priority;

    public function __construct(Vertex $vertex, int $priority)
    {
        parent::__construct($vertex);
        $this->priority = $priority;
    }
}