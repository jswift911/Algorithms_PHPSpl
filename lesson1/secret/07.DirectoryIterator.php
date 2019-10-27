<?php


// Создаем новый объект DirectoryIterator
$dir = new DirectoryIterator("/Users/alterwalker/dev/web/geekbrains/php-2/");
// Цикл по содержанию директории
foreach ($dir as $item) {
    echo $item . PHP_EOL;

}


