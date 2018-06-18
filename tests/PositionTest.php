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

        self::assertEquals('4:3', (string) $position);
    }

    public function testItCanCreateNextColumn()
    {
        $position = new Position(3, 4);

        $nextColumn = Position::nextColumn($position);

        self::assertEquals('4:4', (string) $nextColumn);
    }

    public function testItCanCreateNextRow()
    {
        $position = new Position(2, 6);

        $nextRow = Position::nextRow($position);

        self::assertEquals('2:7', (string) $nextRow);
    }
}
