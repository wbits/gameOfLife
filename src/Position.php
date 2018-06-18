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

    public function __toString(): string
    {
        return sprintf('%d:%d', $this->col, $this->row);
    }
}
