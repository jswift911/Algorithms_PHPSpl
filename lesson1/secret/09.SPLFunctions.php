<?php

function print_caps(Iterator $iterator) {
    echo strtoupper($iterator->current()) . "\n";
    return TRUE;
}

$it = new ArrayIterator(["Apples", "Bananas", "Cherries"]);


iterator_apply($it, "print_caps", [$it]);


/*
class_implements - возвращает список интерфейсов, реализованных в заданном классе или интерфейсе;
class_parents — возвращает список родительских классов заданного класса;
class_uses — возвращает список трейтов, используемых заданным классом;
iterator_apply — вызывает функцию для каждого элемента в итераторе;
iterator_count — подсчитывает количество элементов в итераторе;
iterator_to_array — копирует итератор в массив;
spl_autoload_call — попытка загрузить описание класса всеми зарегистрированными методами __autoload();
spl_autoload_extensions — регистрация и вывод расширений файлов для spl_autoload;
spl_autoload_functions — получение списка всех зарегистрированных функций __autoload()
spl_autoload_register — регистрирует заданную функцию в качестве реализации метода __autoload(). Является более предпочтительным вызовом автозагрузчиков. Активно используется во многих каркасах.
spl_autoload_unregister — отмена регистрации функции в качестве реализации метода __autoload();
spl_autoload — реализация по умолчанию метода __autoload();
spl_classes — возвращает доступные классы SPL;
spl_object_hash — возвращает хеш-идентификатор для объекта.

 */