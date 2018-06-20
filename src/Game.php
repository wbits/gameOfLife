<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Game
{
    private $grid;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    public static function firstGeneration(int $width, int $height): Game
    {
        return new self(new Grid($width, $height));
    }
}
