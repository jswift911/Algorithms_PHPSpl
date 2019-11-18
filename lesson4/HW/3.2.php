<?php

function action($a, $n, $res)
{
    for ($i = 0; $i < 3; $i++) {
        $x = 0;
        if ($i === 0 && $n % 3 === 0) $x = $n / 3;
        if ($i === 1 && $n % 2 === 0) $x = $n / 2;
        if ($i === 2 && $n > 1) $x = $n - 1;
        if ($x === 1 && ($a < $res || !$res)) $res = $a;
        if ($x > 1 && ($a < $res || !$res)) $res = action($a + 1, $x, $res);
    }

    return $res;
}

$n = 32718;
$res = action(1, $n, 0);
print_r('К числу ' . $n . ' необходимо применить ' . $res . ' операций.' . PHP_EOL);