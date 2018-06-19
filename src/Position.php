<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Position
{
    private $col;
    private $row;

    public function __construct(int $col, int $row)
    {
        $this->col = $col;
        $this->row = $row;
    }

    public static function nextColumn(Position $position): Position
    {
        return new self($position->col + 1, $position->row);
    }

    public static function nextRow(Position $position): Position
    {
        return new self(0, $position->row + 1);
    }

    public static function neighbours(Position $position): \Generator
    {
        yield new self($position->col - 1, $position->row - 1);  // NW
        yield new self($position->col, $position->row - 1);          // N
        yield new self($position->col + 1, $position->row - 1);  // NE
        yield new self($position->col - 1, $position->row);          // E
        yield self::nextColumn($position);                               // W
        yield new self($position->col - 1, $position->row + 1);  // NW
        yield new self($position->col, $position->row + 1);          // N
        yield new self($position->col + 1, $position->row + 1);  // NE
    }

    public function col(): int
    {
        return $this->col;
    }

    public function row(): int
    {
        return $this->row;
    }

    public function __toString(): string
    {
        return sprintf('%d:%d', $this->col, $this->row);
    }
}
