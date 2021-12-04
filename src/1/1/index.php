<?php

echo 'Day 1: Sonar Sweep' . PHP_EOL;

$measurements = inputs_1_1();

$increases = array_filter(
	$measurements,
	function( $measurement, $index ) use ( $measurements ) {
		if ( ! isset( $measurements[ $index - 1 ] ) ) {
			return false;
		}

		return $measurement > $measurements[$index - 1];
	},
	ARRAY_FILTER_USE_BOTH
);

echo count( $increases ) . PHP_EOL;
