<?php

$a = 5;
$b = &$a;
$b++;
echo $a;

function add(&$link) {
	$link++;
}
add($a);

echo $a;

function &add2 (&$link) {
	$link++;
	return $link;
}

$c = add2($a);
$c ++;
