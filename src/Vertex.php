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

    public function addEdge(Vertex $endVertex, ?int $weight): void
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

    public function print(bool $showWeight): void
    {
        $message = "";

        if (empty($this->edges)) {
            echo sprintf("%s -->%s", $this->data, PHP_EOL);
            return;
        }

        /**
         * @var int $key
         * @var Edge $edge
         */
        foreach ($this->edges as $key => $edge) {
            if (0 === $key) {
                $message .= $edge->getStart()->data . " --> ";
            }

            $message .= $edge->getEnd()->data;

            if ($showWeight) {
                $message .= " (" . $edge->getWeight() . ")";
            }

            if ($key != count($this->edges) - 1) {
                $message .= ", ";
            }
        }

        echo $message . PHP_EOL;
    }
}