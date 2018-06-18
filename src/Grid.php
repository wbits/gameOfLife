<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Grid implements \Iterator
{
    private $position;

    public function __construct()
    {
        $this->rewind();
    }

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        $this->position = Position::nextColumn($this->position);
    }

    public function key(): string
    {
        return (string) $this->position;
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind(): void
    {
        $this->position = new Position(0, 0);
    }
}
