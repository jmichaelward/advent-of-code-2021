<?php
namespace JMichaelWard\AdventOfCode2021\Two;

class Position {
	/**
	 * The current horizontal position.
	 *
	 * @var int
	 */
	private int $horizontal = 0;

	/**
	 * The current depth.
	 *
	 * @var int
	 */
	private int $depth = 0;

	/**
	 * Update coordinates.
	 *
	 * @param Direction $direction
	 *
	 * @throws Exception
	 * @return void
	 */
	public function update( Direction $direction ): void {
		switch ( strtolower( $direction->get_direction() ) ) {
			case 'up':
				$this->depth = $this->depth - $direction->get_value();
				break;
			case 'down':
				$this->depth = $this->depth + $direction->get_value();
				break;
			case 'forward':
				$this->horizontal = $this->horizontal + $direction->get_value();
				break;
			default:
				throw new Exception('Invalid direction.');
		}
	}

	/**
	 * Returns the multiplied coordinates of the horizontal position and depth.
	 *
	 * @return void
	 */
	public function print_multiplied_coordinates() {
		echo $this->horizontal * $this->depth . PHP_EOL;
	}
}
