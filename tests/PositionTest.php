<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class PositionTest extends TestCase
{
    public function testItHasColAndRow()
    {
        $col = 4;
        $row = 3;

        $position = new Position($col, $row);

        self::assertEquals('3,4', (string) $position);
    }
}
