<?php
/**
 * @see https://adventofcode.com/2021/day/2#part2
 */

use JMichaelWard\AdventOfCode2021\Two\AimedPosition;
use JMichaelWard\AdventOfCode2021\Two\Direction;

print_title('Day 2: Dive!');

$position = new AimedPosition();

foreach ( inputs_2_1() as $key => $data ) {
	$position->update(new Direction($data));
}

$position->print_multiplied_coordinates();
