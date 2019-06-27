<?php

namespace Bejeweled\Game;

class Position
{
    private $x;

    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    public function equals(Position $otherPosition): bool
    {
        return $this->x === $otherPosition->x
            && $this->y === $otherPosition->y;
    }
}
