<?php

function findLongestNonRepeatingSubStr($inputStr)
{
    $str = '';
    $longestStr = '';
    $hash = [];

    for ($i = 0; $i < strlen($inputStr); $i++) {
        $currChar = $inputStr[$i];
        if ($hash[$inputStr[$i]] === null) { // if hash doesn't have the char,
            $str .= $currChar; //add it to str
            $hash[$inputStr[$i]] = $i; //store the index of the char
        } else {// if a duplicate char found..
            //store the current longest non-repeating chars. until now
            //In case of equal-length, <= right-most str, < will result in left most str
            if (strlen($longestStr) < strlen($str)) {
                $longestStr = $str;
            }
            //Get the previous duplicate char index
            $prevDupeIndex = $hash[$currChar];

            //Find all the chars AFTER previous duplicate char and current one
            $strFromPrevDupe = substr($inputStr, $prevDupeIndex + 1, $i - $prevDupeIndex - 1);
            //*NEW* longest string will be chars AFTER prevDupe till current char
            $str = $strFromPrevDupe . $currChar;
            //Also, Reset hash to letters AFTER duplicate letter till current char
            $hash = [];
            for ($j = $prevDupeIndex + 1; $j <= $i; $j++) {
                $hash[substr($inputStr, $j, 1)] = $j;
            }
        }
    }
    return strlen($longestStr) >= strlen($str) ? $longestStr : $str;
}

$inputStr = 'abcabcbb';
print_r('Input: "' . $inputStr . '"' . PHP_EOL);
$longestStr = findLongestNonRepeatingSubStr($inputStr);
print_r('Output: ' . strlen($longestStr) . PHP_EOL);
print_r('Пояснение: Ответ "' . $longestStr . '",с длиной ' . strlen($longestStr) . PHP_EOL);


$inputStr = 'bbbbb';
print_r('Input: "' . $inputStr . '"' . PHP_EOL);
$longestStr = findLongestNonRepeatingSubStr($inputStr);
print_r('Output: ' . strlen($longestStr) . PHP_EOL);
print_r('Пояснение: Ответ "' . $longestStr . '",с длиной ' . strlen($longestStr) . PHP_EOL);


$inputStr = 'pwwkew';
print_r('Input: "' . $inputStr . '"' . PHP_EOL);
$longestStr = findLongestNonRepeatingSubStr($inputStr);
print_r('Output: ' . strlen($longestStr) . PHP_EOL);
print_r('Пояснение: Ответ "' . $longestStr . '",с длиной ' . strlen($longestStr) . PHP_EOL);

