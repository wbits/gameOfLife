<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Column
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public static function west(Column $col): Column
    {
        return new self($col->number - 1);
    }

    public static function east(Column $col): Column
    {
        return new self($col->number + 1);
    }

    public function number(): int
    {
        return $this->number;
    }
}
