<?php

$array = [1, 5, 6, 8, 2, 2, 0, 3, 4, 9, 7];


function FindDublicates($array)
{
    for($i = 0; $i < count($array); $i++) {
        for($j = 0; $j < count($array); $j++) {
            if ($i != $j) {
                if ($array[$i] == $array[$j]) {
                    return 1;
                }
            }
        }
    }

    // Если дошли до этого места, дубликатов нет
    return 0;
}


echo FindDublicates($array) . PHP_EOL;

/*
Алгоритм содержит два цикла, один из которых – вложенный.
Внешний цикл перебирает все элементы массива N, выполняя O(N) шагов.
Внутри каждого такого шага внутренний цикл повторно пересматривает все
N элементов массива, совершая те же O(N) шагов. Следовательно, общая
производительность алгоритма составит O(N x N) = O(N^2).

*/