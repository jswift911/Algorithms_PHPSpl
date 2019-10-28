<?php

function InterpolationSearch($myArray, $num)
{

	$start = 0;
	$last = count($myArray) - 1;

	while (($start <= $last) && ($num >= $myArray[$start]) && ($num <= $myArray[$last])) {

		$pos = floor($start + (
				(($last - $start) / ($myArray[$last] - $myArray[$start]))
				* ($num - $myArray[$start])
			));
echo $pos.PHP_EOL;
		if ($myArray[$pos] == $num) {
			return $pos;
		}

		if ($myArray[$pos] < $num) {
			$start = $pos + 1;
		}

		else {
			$last = $pos - 1;
		}

	}
	return null;

}

include "randArray.php";
echo InterpolationSearch(getSortRandArray(), 500);