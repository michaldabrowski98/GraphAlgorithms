<?php

namespace App\Graph\PriorityQueue;

use App\Graph\Vertex;

class PriorityQueue
{
    /**
     * @var Node[]
     */
    public array $priorityQueue;

    public int $size;

    public function __construct()
    {
        $this->priorityQueue = [];
        $this->size = -1;
    }


    public function add(Vertex $vertex, int $priority): void
    {
        $this->size++;
        $this->priorityQueue[$this->size] = new Node($vertex, $priority);
    }

    public function peek(): int
    {
        $highestPriority = PHP_INT_MIN;
        $ind = -1;

        for ($i = 0; $i <= $this->size; $i++) {
            if ($highestPriority == $this->priorityQueue[$i]->priority && $ind > -1
                && $this->priorityQueue[$ind]->data < $this->priorityQueue[$i]->data) {
                $highestPriority = $this->priorityQueue[$i]->priority;
                $ind = $i;
            }
            else if ($highestPriority < $this->priorityQueue[$i]->priority) {
                $highestPriority = $this->priorityQueue[$i]->priority;
                $ind = $i;
            }
        }

        return $ind;
    }

    public function poll(): ?Node
    {
        if (empty($this->priorityQueue)) {
            return null;
        }

        $ind = $this->peek();

        $current = $this->priorityQueue[$ind];

        for ($i = $ind; $i < $this->size; $i++) {
            $this->priorityQueue[$i] = $this->priorityQueue[$i + 1];
        }

        $this->size--;

        return $current;
    }
}