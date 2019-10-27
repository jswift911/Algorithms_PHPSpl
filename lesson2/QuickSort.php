<?php
//include  './06Bubble.php';
//include './08QuickSort.php';
function quickSort (array $mas) {

	$count = count($mas);

	if($count <= 1) {
		return $mas;
	}

	$baseEl = $mas[0];

	$left = [];
	$right = [];

	for ($i = 1; $i< $count; $i++) {
		if ($mas[$i] <= $baseEl) {
			$left[] = $mas[$i];
		}
		else {
			$right[] = $mas[$i];
		}
	}
	$left = quickSort($left);
	$right = quickSort($right);

	return array_merge($left, [$baseEl], $right);

}

$arr = [5, 3, 12, 1, 4, 2, 7, 5, 8, 8, 8, 0];

for ($i = 0; $i < 1000000; $i++) {
	$arr[] = mt_rand(0, 1000);
}

$arrCount = count($arr);


$startTime = microtime(true);
quickSort($arr);
//quickSort2($arr, 0, $arrCount);
//bubbleSort($arr);
//sort($arr);
echo microtime(true) - $startTime;