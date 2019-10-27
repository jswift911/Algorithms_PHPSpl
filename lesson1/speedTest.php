<?php

include 'lesson.php';
const COUNT = 10000000;
$stackOur = new MyStack(100000);
$stackSpl = new SplStack();

$arrayOut = [];
$arraySpl = new SplFixedArray(COUNT);



$start = microtime(true);

/*for ($i = 0; $i < COUNT; $i++) {
	$stackSpl -> push(1);
}*/

//
for ($i = 0; $i < COUNT; $i++) {
	$arrayOut[$i] = $i;
}

foreach ($arrayOut as $value) {
	$value *= 2;
}

echo microtime(true) - $start;