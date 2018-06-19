<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Position
{
    private $col;
    private $row;

    public function __construct(Column $col, int $row)
    {
        $this->col = $col;
        $this->row = $row;
    }

    public static function nextColumn(Position $position): Position
    {
        return new self(Column::east($position->col), $position->row);
    }

    public static function nextRow(Position $position): Position
    {
        return new self(new Column(0), $position->row + 1);
    }

    public static function neighbours(Position $position): \Generator
    {
        $west = Column::west($position->col);
        $east = Column::east($position->col);
        $north = $position->row - 1;
        $south = $position->row + 1;

        yield new self($west, $north);
        yield new self($position->col, $north);
        yield new self($east, $north);

        yield new self($east, $position->row);
        yield self::nextColumn($position);

        yield new self($west, $south);
        yield new self($position->col, $south);
        yield new self($east, $south);
    }

    public function col(): Column
    {
        return $this->col;
    }

    public function row(): int
    {
        return $this->row;
    }

    public function __toString(): string
    {
        return sprintf('%d:%d', $this->col->number(), $this->row);
    }
}
