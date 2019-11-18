<?php

function isPrime($num)
{
    for ($i = 1; $i < $num / 2; $i += 2) {
        if ($num % $i === 0 && $i != 1) {
            return false;
        }
    }

    return true;
}

function findPrimeNumber($n)
{
    $y = 1;
    for ($x = 2; $x <= $n; $x ++) {
        do {
            $y = $y + 2;
        } while (!isPrime($y));
    }

    return $y;
}

$n = 10001;
print_r('Простое число под номером ' . $n . ' = ' . findPrimeNumber($n) . PHP_EOL);

