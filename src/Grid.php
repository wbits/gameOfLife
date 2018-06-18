<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Grid implements \Iterator
{
    /**
     * @var Position
     */
    private $position;

    private $width;

    public function __construct(int $width)
    {
        $this->width = $width;

        $this->rewind();
    }

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        if (($this->position->col() + 1) === $this->width) {
            $this->position = Position::nextRow($this->position);
        } else {
            $this->position = Position::nextColumn($this->position);
        }
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
