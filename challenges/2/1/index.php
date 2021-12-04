<?php
/**
 * @see https://adventofcode.com/2021/day/2
 */

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
	public function get_multiplied_coordinates() {
		echo $this->horizontal * $this->depth;
	}
}


class Direction {
	/**
	 * Direction of the submarine.
	 *
	 * @var string
	 */
	private string $direction;

	/**
	 * Amount of movement.
	 *
	 * @var int
	 */
	private int $value;

	/**
	 * Create the direction from the raw text value.
	 *
	 * @param string $raw_value
	 */
	public function __construct( string $raw_value ) {
		$data = explode( ' ', $raw_value );

		$this->direction = $data[0];
		$this->value     = abs( $data[1] );
	}

	/**
	 * Get the direction to move.
	 *
	 * @return string
	 */
	public function get_direction(): string {
		return $this->direction;
	}

	/**
	 * Get the amount to move.
	 *
	 * @return int
	 */
	public function get_value(): int {
		return $this->value;
	}
}

/**
 * Run the program.
 */
$position = new Position();

foreach ( inputs_2_1() as $data ) {
	$position->update(new Direction($data));
}

echo $position->get_multiplied_coordinates() . PHP_EOL;
