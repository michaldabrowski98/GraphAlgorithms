<?php

namespace App\Graph\Queue;

use App\Graph\Vertex;

class LinkedList
{
    public ?Node $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function addToHead(Vertex $data): void
    {
        $newHead = new Node($data);
        $currentHead = $this->head;
        $this->head = $newHead;

        if (null !== $currentHead) {
            $this->head->setNextNode($currentHead);
        }
    }

    public function addToTail(Vertex $data): void
    {
        $tail = $this->head;
        if (null === $tail) {
            $this->head = new Node($data);
        } else {
            while (null !== $tail->getNextNode()) {
                $tail = $tail->getNextNode();
            }
            $tail->setNextNode(new Node($data));
        }
    }

    public function removeHead(): ?Vertex
    {
        $removeHead = $this->head;
        if (null === $removeHead) {
            return null;
        }
        $this->head = $removeHead->getNextNode();
        return $removeHead->data;
    }
}