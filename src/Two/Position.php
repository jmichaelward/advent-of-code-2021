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
		try {
			call_user_func( [ $this, "move_{$direction->get_direction()}" ], $direction->get_value() );
		} catch ( \Throwable $e ) {
			throw new \Exception('Invalid direction given');
		}
	}

	/**
	 * Move the position up.
	 *
	 * @param int $value
	 *
	 * @return void
	 */
	public function move_up( int $value ): void {
		$this->depth = $this->depth - $value;
	}

	/**
	 * Move the position down.
	 *
	 * @param int $value
	 *
	 * @return void
	 */
	public function move_down( int $value ): void {
		$this->depth = $this->depth + $value;
	}

	/**
	 * Move the position forward.
	 *
	 * @param int $value
	 *
	 * @return void
	 */
	public function move_forward( int $value ): void {
		$this->horizontal = $this->horizontal + $value;
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
