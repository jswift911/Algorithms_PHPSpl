<?php


$arr = ["Moscow", "Munich", "Beijing", "Roma", "Barcelona", "London"];

$obj = new ArrayObject( $arr );
$iter = $obj->getIterator();

foreach ($arr as $key => $value ) {
	echo $key . '='. $value;
}

// Цикл для обработки объекта
while( $iter->valid() )
{
    echo $iter->key() . "=" . $iter->current() . "\n";
    $iter->next();
    echo $iter->current();
    $iter->prev();
}
