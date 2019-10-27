<?php
// Задание №1
$path = $_SERVER['DOCUMENT_ROOT'];
$dir = new DirectoryIterator($path);
$getPath = $dir->getPath();

foreach ($dir as $item) {
    // Папки ссылками
    if ($dir->isDir()) {
        if ($dir->isDot()) {
            continue;
        }
       echo "<a href=\"$getPath/{$dir->getFilename()}/\">" . $dir->getFilename() . "</a>" . "<br>";
    }
    // Файлы без ссылок
    else {
        echo $item . "<br>";
     }
}

// Задание №2
// ------------------------------------------------------
// При 1 миллионе данных - значения практически одинаковые,
// при 10 миллионах - Spl заметно быстрее,
// примерно при 2 миллионах данных Spl начинает работать быстрее, чем обычный foreach

include 'lesson1/lesson.php';
const COUNT = 2000000;

$arrayOut = [];
$arraySpl = new SplFixedArray(COUNT);



$start = microtime(true);


for ($i = 0; $i < COUNT; $i++) {
    $arrayOut[$i] = $i;
}

foreach ($arrayOut as $value) {
    $value *= 2;
}

// echo microtime(true) - $start;