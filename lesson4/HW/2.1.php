<?php

//определение палиндрома без цикла

function checkChar($str, $num)
{
    if ($num < 0) {
        return true;
    } elseif (!($str[$num] === $str[strlen($str) - $num - 1])) {
        return false;
    } else {
        return checkChar($str, $num - 1);
    }
}

function isPalinom($str)
{
    return checkChar($str, floor(strlen($str) / 2) - 1);
}

$str = 'abcba';
printf(isPalinom($str) ? 'yes' : 'no');

//=========================================

$word = 'bob';
$reverseWord = implode(array_reverse(str_split($word)));
echo ($word === $reverseWord) ? "Слово {$word} является палиндромом" : "Слово {$word} НЕ является палиндромом";

//==========================================

$text = 'sum summus mus';


function isPal($text)
{
	$text_1 = preg_replace("'\s'", "", strtolower($text));
	$text_2 = iconv("windows-1251", "utf-8", strrev(iconv("utf-8", "windows-1251", $text_1)));
	if ($text_1 == $text_2) {
		echo 'YES';
		return true;
	} else {
		echo 'NO';
		return false;}
}


isPal($text);


//=================================================

$string = 'xxwwwwwxx';
echo Palindrome($string, 0, strlen($string) - 1);

function Palindrome($string, $firstIndex = 0, $secondIndex = 0)
{

	if ($firstIndex == $secondIndex || $firstIndex > $secondIndex) {
		return true;
	}

	$firstLetter = $string[$firstIndex];
	$secondLetter = $string[$secondIndex];

	if ($firstLetter == $secondLetter) {
		$firstIndex++;
		$secondIndex--;
		if (Palindrome($string, $firstIndex, $secondIndex)) {
			return true;
		}
	}
	return false;
}
