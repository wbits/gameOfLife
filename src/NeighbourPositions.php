<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class NeighbourPositions
{
    private $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    public function __invoke(): \Generator
    {
        yield new Position($this->position->col(), Row::north($this->position->row()));
        yield new Position($this->position->col(), Row::South($this->position->row()));

        yield new Position(Column::east($this->position->col()), $this->position->row());
        yield new Position(Column::west($this->position->col()), $this->position->row());

        yield new Position(Column::west($this->position->col()), Row::north($this->position->row()));
        yield new Position(Column::east($this->position->col()), Row::north($this->position->row()));

        yield new Position(Column::west($this->position->col()), Row::south($this->position->row()));
        yield new Position(Column::east($this->position->col()), Row::south($this->position->row()));
    }
}

