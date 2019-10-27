<?php

// 1.Простые делители числа 13195 - это 5, 7, 13 и 29.
// Каков самый большой делитель числа 600851475143, являющийся простым числом?

function divide($number, $start)
{
    for ($i = $start; $i * $i <= $number; $i += 2) {
        if ($number % $i == 0) return $i;
    }
    return $number;
}

$number = 600851475143;
$dividers = []; // делители
$start = 3;

while ($number % 2 == 0) {
    $dividers[] = $number;
    $number /= 2;
}

while ($number > 1) {
    $start = divide($number, $start);
    $number /= $start;
    printf(nl2br("%d\n"), $start);
}

// 2*. (С реального собеседования) По заданной строке найдите размер самой длинной подстроки
// без повторяющихся символов. Вернуть числовой ответ.
//Примеры:
//Input: "abcabcbb"
//Output: 3
//Пояснение: Ответ "abc",с длиной 3.

//$input = "abcabcbb";
//$strLength = strlen($input);
//for ($start = 0; $start <= $strLength; $strLength--) {
//   echo $subStr = mb_substr($input, $start, $strLength) . "<br/>";
//}
//
