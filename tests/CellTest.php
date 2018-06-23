<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class CellTest extends TestCase
{
    public function testItCanBeCreatedAlive()
    {
        $cell = new Cell(true);

        self::assertTrue($cell->isAlive());
    }

    public function testItCanInteract()
    {
        $cell = new Cell(true);
        $currentCell = new Cell(false);

        $currentCell->interact($cell);

        self::assertEquals(1, $currentCell->livingNeighbours());
    }
}
