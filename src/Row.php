<?php

declare(strict_types = 1);

namespace Dojo\GameOfLife;

final class Row
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public static function north(Row $row): Row
    {
        return new self($row->number - 1);
    }

    public static function south(Row $row): Row
    {
        return new self($row->number + 1);
    }

    public function number(): int
    {
        return $this->number;
    }
}
