<?php

class FileExtensionFilter extends FilterIterator
{
// Белый список расширений файлов
    protected $ext = ["php", "txt"];

// Абстрактный метод, который надо реализовать в подклассе
    public function accept() {
        return in_array($this->getExtension(), $this->ext);
    }
}

//Создаем новый итератор
$dir = new FileExtensionFilter(new DirectoryIterator("./"));

// Создан итератор в итераторе

foreach ($dir as $item) {
    echo $item . PHP_EOL;
}