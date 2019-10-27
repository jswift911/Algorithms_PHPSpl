<?php

//  (({[{( )}]))

$array = ['Стол', "Стул", "Диван", "Кровать"];

echo current($array); //stol
echo next($array); //stul
echo next($array); //divan
echo prev($array); //stul
echo end($array); // krovat
echo reset($array); //stol
//each