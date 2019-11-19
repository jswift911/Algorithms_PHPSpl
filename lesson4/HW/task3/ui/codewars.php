<?php

// Убрать буквы сначала и конца
function remove_char(string $s): string
{
    return substr($s, 1, -1);
}

// Перевернутое слово
function reverseString($str)
{
    return strrev($str);
}

function solution($number)
{
    $solutions = [];
    for ($i = 1; $i < $number; $i++) {
        if ($i % 3 == 0 || $i % 5 == 0) {
            $solutions[] = $i;
        }
    }
    return array_sum($solutions);
}

//убрать пробелы из строки
function no_space(string $str): string
{
    return str_replace(' ', '', $str);
}

//строку в число
function stringToNumber($str): int
{
    return $str;
}

//Массив по числу элементов
//function monkeyCount($n) {
//    $monkeys = [];
//    for ($i = 1; $i <= $n; $i++) {
//        $monkeys[] = $i;
//    }
//    return $monkeys;
//}

function monkeyCount($n)
{
    return range(1, $n);
}


// Пробелы между буквами
function spacify(string $str): string
{
    $arr = str_split($str);
    $s = implode(" ", $arr);
    return $s;
}

// Превращает слова в верхний регистр
//function camel_case(string $str): string {
//    $words = explode(" ", $str);
//    $camelWords = [];
//    foreach ($words as $word)
//    {
//        $camelWords[] = ucfirst($word);
//    }
//    $words = implode($camelWords);
//    return $words;
//}

function camel_case(string $s): string
{
    return str_replace(' ', '', ucwords(trim($s)));
}


//function findShort($str){
//    $arr = explode(' ', $str);
//    $arr2 = [];
//    foreach ($arr as $word) {
//        $arr2[] = strlen($word);
//    }
//    $min = min($arr2);
//    return $min;
//}
//
//var_dump(findShort('a mila ramu'));

//Находит длину наименьшего слова
function findShort($str)
{
    return min(array_map('strlen', (explode(' ', $str))));
    //array_map применяет функцию strlen к каждому элементу массива
}


//Делает из массива номер телефона [1, 2, 3, 4, 5, 6, 7, 8, 9, 0]
//function createPhoneNumber($numbersArray) {
//    $start = $numbersArray[0] . $numbersArray[1] . $numbersArray[2];
//    $middle = $numbersArray[3] . $numbersArray[4] . $numbersArray[5];
//    $end = $numbersArray[6] . $numbersArray[7] . $numbersArray[8] . $numbersArray[9];
//    return $phone = "($start) $middle-$end";
//}

function createPhoneNumber(array $digits): string {
    return sprintf("(%d%d%d) %d%d%d-%d%d%d%d", ...$digits);
}

// удаляет все после якоря #
//function replaceAll($string) {
//    $pos = strripos($string, '#');
//    if ($pos !== false) {
//        return substr(preg_replace("#[^\#]+$#", '', $string), 0, -1);
//    }
//    return $string;
//}

//function replaceAll(string $string) :string
//{
//    return preg_replace('/#.*$/','',$string);
//
//}

function replaceAll($string) {
    return explode("#", $string)[0];
}

// Простое ли число
function is_prime(int $n): bool {
    if ($n <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}


//function tower_builder(int $n): array {
////    for ($i = 0, $j = "*"; $i < $n; $i++, $j = "*" . $j . "*") {
////        if ($i == 0) $j = "  *  ";
////        if ($i == 1) $j = " *** ";
////        if ($i == 2) $j = "*****";
////        $tower[] = $j;
////    }
////    return $tower;
//    $i = $n;
//
//    while ($i--)
//        $tower[] = str_repeat(' ', $i).rtrim(str_repeat('* ', $n - $i)).str_repeat(' ', $i);
//    return $tower;
//}

//[
//      [1, 4],
//      [7, 10],
//      [3, 5]
//    ]
