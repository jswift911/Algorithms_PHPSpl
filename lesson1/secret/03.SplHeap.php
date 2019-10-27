<?php

echo 'SplMaxHeap' . PHP_EOL;

$heap = new SplMaxHeap();

$heap->insert('111');
$heap->insert('666');
$heap->insert('777');
$heap->insert('333');


echo $heap->extract();
echo PHP_EOL;
echo $heap->extract();
echo PHP_EOL;
echo $heap->extract();
echo PHP_EOL;
echo $heap->extract();
echo PHP_EOL;


echo 'SplMinHeap' . PHP_EOL;
$heap = new SplMinHeap();

$heap->insert('111');
$heap->insert('666');
$heap->insert('777');
$heap->insert('333');


echo $heap->extract();
echo PHP_EOL;
echo $heap->extract();
echo PHP_EOL;
echo $heap->extract();
echo PHP_EOL;
echo $heap->extract();
echo PHP_EOL;



