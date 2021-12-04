<?php

namespace JMichaelWard\AdventOfCode2021\Two;

class AimedPosition extends Position {
	/**
	 * Current aim.
	 *
	 * @var int
	 */
	private int $aim = 0;

	public function move_up( int $value ): void {
		$this->aim -= $value;
	}

	public function move_down( int $value ): void {
		$this->aim += $value;

	}

	public function move_forward( int $value ): void {
		parent::move_forward( $value );
		$this->depth += ( $this->aim * $value );
	}
}
