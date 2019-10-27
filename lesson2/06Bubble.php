<?php

$array = [1, 5, 6, 8, 2, 2, 0, 3, 4, 9, 7];



function bubbleSort($array){

    for($i=0; $i<count($array); $i++){

        for($j=$i+1; $j<count($array); $j++){

            if($array[$i]>$array[$j]){

                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;

            }
        }
    }

    return $array;
}



