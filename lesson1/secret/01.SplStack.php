<?php

$stack = new SplStack();

$stack->push('1');
$stack->push('2');
$stack->push('3');
$stack->push('4');
$stack->push('5');

echo $stack->count();
echo PHP_EOL;

echo $stack->top();
echo PHP_EOL;

echo $stack->bottom();
echo PHP_EOL;

echo $stack->serialize();
echo PHP_EOL;

echo $stack->pop(); //
echo PHP_EOL;

echo $stack->pop(); //
echo PHP_EOL;

echo $stack->pop(); //
echo PHP_EOL;

echo $stack->pop(); //
echo PHP_EOL;
