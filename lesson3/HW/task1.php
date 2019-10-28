<?php

function maxPrimeDivider($n)
{
    $res = $n % 2 ? 1 : 2;

    while (!($n % 2)) {
        $n /= 2;
    }

    for ($q = 3; $q * $q < $n; $q += 2) {
        for (; !($n % $q); $n /= $q) {
            $res = $q;
        }
    }

    return $res > $n ? $res : $n;
}

$n = 132;
print_r('Самый большой делитель числа ' . $n . ' = ' . maxPrimeDivider($n) . PHP_EOL);
$n = 600851475143;
print_r('Самый большой делитель числа ' . $n . ' = ' . maxPrimeDivider($n) . PHP_EOL);

