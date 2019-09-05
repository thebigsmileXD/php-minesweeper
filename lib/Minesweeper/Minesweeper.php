<?php
declare(strict_types=1);

namespace Minesweeper;

class Minesweeper
{

    /**
     * Build a new grid
     *
     * @param  int $rows
     * @param  int $columns
     * @param  int $mines
     *
     * @return \Minesweeper\Grid
     * @throws Exception\InvalidPositionException
     * @throws Exception\InvalidPositionException
     */
    public function buildGrid(int $rows, int $columns, int $mines = 10): Grid
    {
        // Negative mines
        if ($mines < 0) {
            $mines = 10;
        }

        return new Grid($rows, $columns, $mines);
    }
}