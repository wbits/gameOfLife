<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class GameOfLife
{
    private $grid;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    public static function firstGeneration(int $width, int $height): GameOfLife
    {
        return new self(new Grid($width, $height));
    }
}
