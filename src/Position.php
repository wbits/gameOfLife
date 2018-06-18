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

    public function __toString(): string
    {
        return sprintf('%d:%d', $this->col, $this->row);
    }
}
