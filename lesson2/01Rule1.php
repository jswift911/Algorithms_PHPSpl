<?php

$array = [1, 5, 6, 8, 2, 0, 3, 4, 9, 7];

function findMax($array)
{
    $result = $array[0];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] > $result) {
            $result = $array[$i];
        }
    }

    return $result;
}

echo findMax($array) . PHP_EOL;

/*
 * O(1) + O(f(n+1+1)) + O(1)
 * O(1) + O(f(n*2)) + O(1)
 * O(n)
 *
 */