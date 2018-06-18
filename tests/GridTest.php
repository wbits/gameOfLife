<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
    public function testItImplementsIterator()
    {
        $grid = new Grid();

        self::assertInstanceOf(\Iterator::class, $grid);
    }
}
