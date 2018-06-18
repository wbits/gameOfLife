<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Position
{
    private $col;
    private $row;

    public function __construct(int $col, int $row)
    {
        if ($col < 0) {
            $col = 0;
        }

        if ($row < 0) {
            $row = 0;
        }

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

    public function __toString(): string
    {
        return sprintf('%d:%d', $this->col, $this->row);
    }
}
