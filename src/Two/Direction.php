<?php

namespace JMichaelWard\AdventOfCode2021\Two;

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
