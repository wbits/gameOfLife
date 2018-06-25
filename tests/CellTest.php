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
        $neighbour = new Cell(true);

        $cell->registerStatus($neighbour);

        self::assertEquals(1, $cell->livingNeighbours());
    }

    public function testALiveCellWithFewerThanTwoLiveNeighboursDies()
    {
        $cell = new Cell(true);

        $nextGeneration = Cell::nextGeneration($cell);

        self::assertFalse($nextGeneration->isAlive());
    }

    public function testAnyLiveCellWithMoreThanThreeLiveNeighboursDies()
    {
        $cell = new Cell(true);
        $livingNeighbour = new Cell(true);

        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);
        $nextGeneration = Cell::nextGeneration($cell);

        self::assertFalse($nextGeneration->isAlive());
    }

    public function testAnyLiveCellWithTwoOrThreeLiveNeighboursLives()
    {
        $cell = new Cell(true);
        $livingNeighbour = new Cell(true);

        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);

        $nextGeneration = Cell::nextGeneration($cell);

        self::assertTrue($nextGeneration->isAlive());
    }

    public function testAnyDeadCellWithExactlyThreeLiveNeighboursBecomesLive()
    {
        $cell = new Cell(false);
        $livingNeighbour = new Cell(true);

        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);

        $nextGeneration = Cell::nextGeneration($cell);

        self::assertTrue($nextGeneration->isAlive());
    }

    public function testAnyDeadCellWithNotExactlyThreeLiveNeighboursRemainsDead()
    {
        $cell = new Cell(false);
        $livingNeighbour = new Cell(true);

        $cell->registerStatus($livingNeighbour);
        $cell->registerStatus($livingNeighbour);

        $nextGeneration = Cell::nextGeneration($cell);

        self::assertFalse($nextGeneration->isAlive());
    }
}
