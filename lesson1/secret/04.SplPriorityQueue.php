<?php

$queue = new SplPriorityQueue();
$queue->setExtractFlags(SplPriorityQueue::EXTR_DATA); // получаем только значения элементов

$queue->insert('Мыла', 70);
$queue->insert('Мама', 75);
$queue->insert('Утром', 90);
$queue->insert('Раму', 60);
$queue->insert('Рано', 80);
$queue->insert('Сегодня', 100);



$queue->top();
while($queue->valid())
{
    echo $queue->current();
    $queue->next();
}
echo PHP_EOL;
//YTREWQ
