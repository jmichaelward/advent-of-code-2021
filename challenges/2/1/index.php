<?php
/**
 * @see https://adventofcode.com/2021/day/2
 */

use JMichaelWard\AdventOfCode2021\Two\Position;
use JMichaelWard\AdventOfCode2021\Two\Direction;

/**
 * Run the program.
 */
$position = new Position();

foreach ( inputs_2_1() as $data ) {
	$position->update(new Direction($data));
}

$position->print_multiplied_coordinates();
