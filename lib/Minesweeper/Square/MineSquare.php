<?php
declare(strict_types=1);

namespace Minesweeper\Square;

class MineSquare extends Square
{

    /**
     * @see \Minesweeper\Square.Square::isGameOver()
     */
    public function isGameOver()
    {
        return true;
    }

    /**
     * @see \Minesweeper\Square.Square::isAutoRevealable()
     */
    public function isAutoRevealable()
    {
        return false;
    }

    /**
     * @see \Minesweeper\Square.Square::__toString()
     */
    public function __toString()
    {
        return 'mine';
    }
}