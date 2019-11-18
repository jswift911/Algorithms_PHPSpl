<?php

function isPalindrom($num)
{
    $s = (string)$num;

    $res = true;
    for ($j = 0; $j < floor(strlen($s) / 2); $j++) {
        if (!($s[$j] === $s[strlen($s) - $j - 1])) {
            $res = false;
            break;
        }
    }

    return $res;
}

function findSumPalindroms($n)
{
    $sum = 0;
    for ($i = 1; $i < $n; $i++) {

        if (isPalindrom($i) && isPalindrom(decbin($i))) {
            $sum += $i;
        }
    }

    return $sum;
}

$n = 1000000;
$sum = findSumPalindroms($n);
printf($sum);