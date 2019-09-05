<?php
declare(strict_types=1);
namespace Minesweeper\Square;

class MineSquare extends Square {

	/**
     * @see \Minesweeper\Square.Square::isGameOver()
	 */
	public function isGameOver()
	{
		return TRUE;
	}

	/**
     * @see \Minesweeper\Square.Square::isAutoRevealable()
	 */
	public function isAutoRevealable()
	{
		return FALSE;
	}

	/**
     * @see \Minesweeper\Square.Square::__toString()
	 */
	public function __toString()
	{
		return 'mine';
	}
}