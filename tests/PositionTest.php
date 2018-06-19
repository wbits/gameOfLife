<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class PositionTest extends TestCase
{
    public function testItHasColAndRow()
    {
        $col = new Column(4);
        $row = 3;

        $position = new Position($col, $row);

        self::assertEquals('4:3', (string) $position);
    }

    public function testItCanCreateNextColumn()
    {
        $position = new Position(new Column(3), 4);

        $nextColumn = Position::nextColumn($position);

        self::assertEquals('4:4', (string) $nextColumn);
    }

    public function testItCanCreateNextRow()
    {
        $position = new Position(new Column(2), 6);

        $nextRow = Position::nextRow($position);

        self::assertEquals('0:7', (string) $nextRow);
    }

    public function testItAPositionCanYieldItsEightNeighbours()
    {
        $c = 0;
        $expectedNumberOfNeighbours = 8;
        $position = new Position(new Column(3), 4);

        foreach (Position::neighbours($position) as $neighbour) {
            $c++;
            self::assertInstanceOf(Position::class, $neighbour);
        }

        self::assertEquals($expectedNumberOfNeighbours, $c);
    }
}
