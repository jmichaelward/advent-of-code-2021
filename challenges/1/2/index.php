<?php
/**
 * @see https://adventofcode.com/2021/day/1#part2
 */

print_title( 'Part 2: Sonar Sweep' );

/**
 * Window class for determining whether an index's window of measurements have increased over the previous window.
 *
 * I threw all of this into an object for fun. :)
 */
class Window {
	/**
	 * The collection of measurements to assess.
	 *
	 * @var array
	 */
	private array $measurements;

	/**
	 * The window index.
	 *
	 * @var int
	 */
	private int $index;

	/**
	 * The collection of indices.
	 * @var array
	 */
	private array $indices;

	/**
	 * @param array $measurements
	 * @param int   $index
	 * @param array $indices
	 */
	public function __construct( array $measurements, int $index, array $indices = [] ) {
		$this->measurements = $measurements;
		$this->index        = $index;
		$this->indices      = $indices;
	}

	/**
	 * Check whether we can still sum a grouping.
	 *
	 * @return bool
	 */
	public function is_measurable(): bool {
		return isset( $this->measurements[ $this->index + 1 ] );
	}

	/**
	 * Save the current index to the indices collection.
	 *
	 * @return void
	 */
	public function save(): void {
		$this->indices[] = $this->index;
	}

	/**
	 * Determine whether the window has an increased total.
	 *
	 * @return bool
	 */
	public function has_increased_sum(): bool {
		return $this->get_sum( $this->index ) > $this->get_sum( $this->index - 1 );
	}

	/**
	 * Get the total number of windows that have increased.
	 *
	 * @return int
	 */
	public function get_increases_count(): int {
		return count( $this->indices );
	}

	/**
	 * Move on to the next index.
	 *
	 * @return Window
	 */
	public function increment(): Window {
		return new self( $this->measurements, $this->index + 1, $this->indices );
	}

	/**
	 * Get the sum of a given index.
	 *
	 * @param $index
	 *
	 * @return int
	 */
	private function get_sum( $index ) {
		return array_sum( array_slice( $this->measurements, $index, 3 ) );
	}
}

/**
 * The actual program.
 */
$window = new Window( inputs_1_1(), 1 );

do {
	if ( $window->has_increased_sum() ) {
		$window->save();
	}

	$window = $window->increment();
} while ( $window->is_measurable() );

// The solution is 1311.
echo $window->get_increases_count() . PHP_EOL;

