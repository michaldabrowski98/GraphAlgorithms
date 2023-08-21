<?php

namespace App\Graph\Queue;

use App\Graph\Vertex;
use Error;

class Queue
{
    public LinkedList $queue;
    public int $size;

    public function __construct()
    {
        $this->queue = new LinkedList();
        $this->size = 0;
    }

    public function isEmpty(): bool
    {
        return 0 === $this->size;
    }

    public function enqueue(Vertex $data): void
    {
        $this->queue->addToTail($data);
        $this->size++;
    }

    public function peel(): ?Vertex
    {
        if ($this->isEmpty()) {
            return null;
        } else {
            return $this->queue->head->data;
        }
    }

    public function dequeue(): Vertex
    {
        if (!$this->isEmpty()) {
            $data = $this->queue->removeHead();
            $this->size--;
            return $data;
        } else {
            throw new Error("LinearDataStructures.Queues.Queue is empty!");
        }
    }
}
