<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class GameOfLifeTest extends TestCase
{
    public function testItStartsWithAFirstGeneration()
    {
        $gridDimensions = [4, 5];

        $game = GameOfLife::firstGeneration(...$gridDimensions);

        self::assertInstanceOf(GameOfLife::class, $game);
    }
}
