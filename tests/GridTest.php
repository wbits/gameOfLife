<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
    const GRID_WIDTH = 3;
    const GRID_HEIGHT = 2;

    /**
     * @var Grid
     */
    private $grid;

    protected function setUp()
    {
        $this->grid = new Grid(self::GRID_WIDTH, self::GRID_HEIGHT);
    }

    public function testItImplementsIterator()
    {
        self::assertInstanceOf(\Iterator::class, $this->grid);
    }

    public function testItHasAStartingPosition()
    {
        $startingPosition = new Position(0, 0);

        self::assertEquals((string)$startingPosition, $this->grid->key());
    }

    public function testItCanDoAnIteration()
    {
        $secondPosition = new Position(1, 0);

        $this->grid->next();

        self::assertEquals((string)$secondPosition, $this->grid->key());
    }

    public function testItCreatesNextRowWhenGridWithIsReached()
    {
        $secondRow = new Position(0, 1);

        $this->grid->next(); // column 1 row 0
        $this->grid->next(); // column 2 row 0
        $this->grid->next(); // column 0 row 1

        self::assertEquals((string)$secondRow, $this->grid->key());
    }

    public function testItCreatesACellForEachPosition()
    {
        $c = 0;
        $expectedNumberOfCells = self::GRID_WIDTH * self::GRID_HEIGHT; // 3 * 2

        foreach ($this->grid as $cell) {
            $c++;
            self::assertInstanceOf(Cell::class, $cell);
        }

        self::assertEquals($expectedNumberOfCells, $c);

    }
}