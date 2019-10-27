<?php

class MyStack {

	protected $stack;
	protected $limit;


	public function __construct( $limit = 5)
	{
		$this->stack = [];
		$this->limit = $limit;
	}

public function push($element) {
		if (count($this->stack) < $this->limit) {
			array_unshift($this->stack, $element);
		}
		else {
			throw new RuntimeException('Стек переполнен!');
		}
}

 public function top() {
		reset($this->stack);
	return current($this->stack);
 }

	public function pop() {
		if (!$this->isEmpty()) {
			return array_shift($this->stack);
		}
		throw new RuntimeException('Стек пустой!');
	}

public function isEmpty() {
		return empty($this->stack);
}

}

/*$object = new MyStack();
$object ->push('Максим');
$object ->push('Александр');
$object ->push('Евгений');

$object->pop();
echo $object->top();

print_r($object);*/