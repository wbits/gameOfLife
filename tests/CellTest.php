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
}
