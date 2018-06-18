<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Grid implements \Iterator
{
    /**
     * @var Position
     */
    private $position;

    private $cells = [];

    private $width;

    private $height;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;

        $this->rewind();
    }

    public function current(): Cell
    {
        $position = (string)$this->position;
        if (!isset($this->cells[$position])) {
            $this->cells[$position] = new Cell;
        }

        return $this->cells[$position];
    }

    public function next(): void
    {
        $this->position = $this->rowDone() ? Position::nextRow($this->position) : Position::nextColumn($this->position);
    }

    public function key(): string
    {
        return (string) $this->position;
    }

    public function valid()
    {
        return $this->position->col() < $this->width && $this->position->row() < $this->height;
    }

    public function rewind(): void
    {
        $this->position = new Position(0, 0);
    }

    private function rowDone(): bool
    {
        return ($this->position->col() + 1) === $this->width;
    }
}
