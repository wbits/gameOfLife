<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Cell
{
    private $alive;
    private $livingNeighbours = 0;

    public function __construct(bool $alive)
    {
        $this->alive = $alive;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function registerStatus(Cell $cell): void
    {
        if (!$cell->alive) {
            return;
        }

        ++$this->livingNeighbours;
    }

    public function livingNeighbours(): int
    {
        return $this->livingNeighbours;
    }
}
