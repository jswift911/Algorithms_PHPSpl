<?php

function palindrom($string)
{
	$arr = str_split($string);
	$result = 123;
	function checkEqual($arr) {
		$lastIndex = count($arr)-1;
		if (count($arr) >= 1){
			if ($arr[0] ===  $arr[$lastIndex]) {
				array_pop($arr);
				if (count($arr) > 1) {
					array_shift($arr);
					checkEqual($arr);
				} else {
					print_r("true");
				}
			} else {
				print_r("false");
			}
		}
	}
	checkEqual($arr);
}


palindrom("argentinamanitnegra"); // true

//palindrom("argbntinamanitnegra"); // false