<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Position
{
    private $col;
    private $row;

    public function __construct(Column $col, Row $row)
    {
        $this->col = $col;
        $this->row = $row;
    }

    public static function initial(): Position
    {
        return new self(new Column(0), new Row(0));
    }

    public static function fromIntegers(int $col, int $row): Position
    {
        return new self(new Column($col), new Row($row));
    }

    public static function nextColumn(Position $position): Position
    {
        return new self(Column::east($position->col), $position->row);
    }

    public static function nextRow(Position $position): Position
    {
        return new self(new Column(0), Row::South($position->row));
    }

    public function neighbours(): \Generator
    {
        $neighbours = new Neighbours($this);

        return $neighbours();
    }

    public function col(): Column
    {
        return $this->col;
    }

    public function row(): Row
    {
        return $this->row;
    }

    public function __toString(): string
    {
        return sprintf('%d:%d', $this->col->number(), $this->row->number());
    }
}
