<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
    /**
     * @var Grid
     */
    private $grid;

    protected function setUp()
    {
        $this->grid = new Grid();
    }

    public function testItImplementsIterator()
    {
        self::assertInstanceOf(\Iterator::class, $this->grid);
    }

    public function testItHasAStartingPosition()
    {
        $startingPosition = new Position(0, 0);

        self::assertEquals((string) $startingPosition, $this->grid->current());
    }
}
