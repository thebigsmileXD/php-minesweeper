<?php
declare(strict_types=1);
namespace Minesweeper;

class Minesweeper {

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
    public function buildGrid(int $rows, int $columns, int $mines = 10)
	{
		// Negative mines
		if ( ! is_numeric($mines) OR $mines < 0)
		{
			$mines = 10;
		}

		$grid = new Grid($rows, $columns, $mines);

		return $grid;
	}
}