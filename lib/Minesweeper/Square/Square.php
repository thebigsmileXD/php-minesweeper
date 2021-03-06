<?php
declare(strict_types=1);

namespace Minesweeper\Square;

/**
 * Base class for squares. Defines whether the square makes you lose the game
 * and holds it's direct surrounding squares for easier recursive
 * manipulations.
 *
 */
abstract class Square
{

    /**
     * @var  boolean  Whether the square is already revealed
     */
    private $revealed = false;

    /**
     * @var Square[]  Simple array with surrounding squares
     */
    private $surrounding_squares = [];

    /**
     * @var bool    Whether the square has been flagged as mine or not
     */
    private $flagged = false;

    /**
     * Let the square reveal itself and its surroundings
     *
     * @return  boolean  Whether the game is over
     */
    public function reveal(): bool
    {
        // Set revealed
        $this->revealed = true;
        $this->flagged = false;

        // Return game over
        if ($game_over = $this->isGameOver()) {
            return $game_over;
        }

        // Reveal surrounding squares if there are no game overs nearby
        if ($this->numberOfSurroundingGameOverSquares() === 0) {
            foreach ($this->getSurroundingSquares() as $square) {
                // Is auto revealable and not already revealed
                if ($square->isAutoRevealable() AND !$square->isRevealed()) {
                    // Reveal
                    $square->reveal();
                }
            }
        }
        return $game_over;
    }

    /**
     * Toggle flag
     */
    public function toggleFlag(): void
    {
        $this->flagged = !$this->flagged;
    }

    /**
     * Whether the square has been flagged as mine or not
     *
     * @return boolean
     */
    public function isFlagged(): bool
    {
        return $this->flagged;
    }

    /**
     * Whether the square is already revealed
     *
     * @return  boolean
     */
    public function isRevealed(): bool
    {
        return $this->revealed;
    }

    /**
     * Returns whether this square makes the game over
     *
     * @return  boolean
     */
    abstract public function isGameOver(): bool;

    /**
     * Whether this square may be auto revealed by surrounding squares
     *
     * @return  boolean
     */
    abstract public function isAutoRevealable(): bool;

    public function addSurroundingSquare(Square $square): void
    {
        array_push($this->surrounding_squares, $square);
    }

    /**
     * Get the surrounding squares
     *
     * @return Square[]
     */
    public function getSurroundingSquares(): array
    {
        return $this->surrounding_squares;
    }

    /**
     * Set surrounding squares
     *
     * @param Square[] $surrounding_squares
     */
    public function setSurroundingSquares(array $surrounding_squares): void
    {
        $this->surrounding_squares = $surrounding_squares;
    }

    /**
     * Return how much surrounding squares will be a game over
     *
     * @return  int
     */
    public function numberOfSurroundingGameOverSquares(): int
    {
        $game_overs = 0;
        foreach ($this->getSurroundingSquares() as $square) {
            if ($square->isGameOver()) {
                $game_overs++;
            }
        }

        return $game_overs;
    }

    /**
     * Description of square
     */
    abstract public function __toString(): string;
}