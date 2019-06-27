<?php

namespace Bejeweled\Game;

class Gem
{
    /**
     * @var string
     */
    private $symbol;

    /**
     * @var int
     */
    private $color;

    public function __construct(string $symbol, int $color)
    {
        $this->symbol = $symbol;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    public function equals(Gem $otherGem): bool
    {
        return $this->symbol === $otherGem->symbol
            && $this->color === $otherGem->color;
    }
}
