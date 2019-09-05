<?php
declare(strict_types=1);

namespace Minesweeper\Square;

class EmptySquare extends Square
{

    /**
     * @see \Minesweeper\Square.Square::isGameOver()
     */
    public function isGameOver(): bool
    {
        return false;
    }

    /**
     * @see \Minesweeper\Square.Square::isAutoRevealable()
     */
    public function isAutoRevealable(): bool
    {
        return true;
    }

    /**
     * @see \Minesweeper\Square.Square::__toString()
     */
    public function __toString(): string
    {
        return 'empty';
    }
}