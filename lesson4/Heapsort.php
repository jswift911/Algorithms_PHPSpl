<?php
// Процедура для преобразования в двоичную кучу поддерева с корневым узлом $i, что является индексом в $arr[]. $countArr - размер кучи

function heapify(&$arr, $countArr, $i)
{
	$largest = $i; // Инициализируем наибольший элемент как корень
	$left = 2*$i + 1; // левый = 2*i + 1
	$right = 2*$i + 2; // правый = 2*i + 2

// Если левый дочерний элемент больше корня
	if ($left < $countArr && $arr[$left] > $arr[$largest])
		$largest = $left;

//Если правый дочерний элемент больше, чем самый большой элемент на данный момент
	if ($right < $countArr && $arr[$right] > $arr[$largest])
		$largest = $right;

// Если самый большой элемент не корень
	if ($largest != $i)
	{
		$swap = $arr[$i];
		$arr[$i] = $arr[$largest];
		$arr[$largest] = $swap;

		// Рекурсивно преобразуем в двоичную кучу затронутое поддерево
		heapify($arr, $countArr, $largest);
	}
}

//Основная функция, выполняющая пирамидальную сортировку
function heapSort(&$arr)
{
	$countArr = count($arr);
// Построение кучи (перегруппируем массив)
	for ($i = $countArr / 2 - 1; $i >= 0; $i--)
		heapify($arr, $countArr, $i);

//Один за другим извлекаем элементы из кучи
	for ($i = $countArr-1; $i >= 0; $i--)
	{
		// Перемещаем текущий корень в конец
		$temp = $arr[0];
		$arr[0] = $arr[$i];
		$arr[$i] = $temp;

		// вызываем процедуру heapify на уменьшенной куче
		heapify($arr, $i, 0);
	}
}

/* Вспомогательная функция для вывода на экран массива размера n */
function printArray(&$arr)
{
	$countArr = count($arr);
	for ($i = 0; $i < $countArr; ++$i)
		echo ($arr[$i]." ") ;

}

// Тестирование
$arr = [6, 1, 8, 3, 5, 2, 4];
heapSort($arr);

echo 'Отсортированный массив: ' . PHP_EOL;
printArray($arr);
