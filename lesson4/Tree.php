<?php

class BinaryNode
{
	public $value;
	public $right;
	public $left;
	public $isDeleted;

	public function __construct($value)
	{
		$this->value = $value;
		$this->right = null;
		$this->left = null;
	}

}

class BinaryTree
{
	public $root;

	public function __construct()
	{
		$this->root = null;
	}

	public function insert($item)
	{
		$node = new BinaryNode($item);

		if ($this->root === null) {
			$this->root = $node;
		} else {
			$this->insertNode($node, $this->root);
		}
	}

	protected function insertNode($node, &$subtree)
	{

		if ($subtree === null) {
			$subtree = $node;
		}

		if ($subtree->value < $node->value) {
			$this->insertNode($node, $subtree->right);

		} elseif ($subtree->value > $node->value) {
			$this->insertNode($node, $subtree->left);
		}
	}

	public function delete($value)
	{
		if ($this->root === null) {
			throw new Exception('Дерево пустое');
		}

		$node = &$this->findNode($value, $this->root);

		if ($node) {
			$this->deleteNode($node);
		}

	}

	public function &findNode($value, BinaryNode &$subtree)
	{
		if (is_null($subtree)) {
			return false;
		}

		if ($subtree->value > $value) {
			return $this->findNode($value, $subtree->left);
		} elseif ($subtree->value < $value) {
			return $this->findNode($value, $subtree->right);
		} else {
			return $subtree;
		}
	}

	protected function deleteNode(BinaryNode &$node)
	{
		if (is_null($node->left) && is_null($node->right)) {
			$node = null;
		} elseif (is_null($node->left)) {
			$node = $node->right;
		} elseif (is_null($node->right)) {
			$node = $node->left;

		}
		else {
			if (is_null($node->right->left)) {
				$node->right->left = $node->left;
			} else {
				$node->value = $node->right->left->value;
				$this->deleteNode($node->right->left);
			}
		}
	}
}

// [1 2 3 4] 6 [ 7 8 9]

$tree = new BinaryTree();
$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(6);
$tree->insert(4);
$tree->insert(2);
$tree->insert(9);
$tree->insert(11);

$tree->delete(4);
$tree->delete(5);

print_r($tree);