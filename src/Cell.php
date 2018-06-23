<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Cell
{
    private $alive;

    public function __construct(bool $alive)
    {
        $this->alive = $alive;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }
}
