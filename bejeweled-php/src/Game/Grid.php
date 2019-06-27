<?php

namespace Bejeweled\Game;

class Grid
{
    /**
     * @var \SplFixedArray
     */
    private $cells;

    /**
     * @var int
     */
    private $numCols;

    /**
     * @var int
     */
    private $numRows;

    public function __construct(int $numCols, int $numRows)
    {
        $this->cells = new \SplFixedArray($numCols * $numRows);
        $this->numCols = $numCols;
        $this->numRows = $numRows;
    }

    public function setValue(Position $p, $value): void
    {
        $index = $this->positionToArrayIndex($p);
        $this->cells[$index] = $value;
    }

    public function getValue(Position $p)
    {
        $index = $this->positionToArrayIndex($p);
        return $this->cells[$index];
    }

    private function positionToArrayIndex(Position $p): int
    {
        return ($this->numCols * $p->getY()) + $p->getX();
    }
}
