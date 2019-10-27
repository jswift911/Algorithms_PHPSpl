<?php

$array = [1, 5, 6, 8, 2, 0, 3, 4, 9, 7, 4, 2, 3];

function findMax($array)
{
    $result = $array[0];                        // O(1)
    for ($i = 1; $i < count($array); $i++) {    // O(N)
        if ($array[$i] > $result) {
            $result = $array[$i];
        }
    }
    return $result;                             // O(1)
}

echo findMax($array) . PHP_EOL;

/*
 *
Если параметр N начнет возрастать, его значение превысит постоянную величину 2,
и предыдущее выражение можно будет упростить до O(N).

*/