<?php

class BinaryNode
{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->right = null;
        $this->left = null;
    }
}

class BinaryTree
{
    protected $stack;
    public $root;

    public function __construct()
    {
        $this->root = null;
        $this->stack = new SplStack();
    }

    public function insertRoot($operation, $operand1, $operand2)
    {
        $node = new BinaryNode($operation);
        $this->root = $node;

        if ($operand2) {
            $nodeRight = new BinaryNode($operand2);
            $node->right = $nodeRight;
        } else {
            $node->right = $this->stack->pop();
        }

        if ($operand1) {
            $nodeLeft = new BinaryNode($operand1);
            $node->left = $nodeLeft;
        } else {
            $node->left = $this->stack->pop();
        }

        $this->stack->push($node);
    }

    public function clearStack()
    {
        $this->stack = null;
    }
}


function buildBynaryTree($arrPolish)
{
    $operators = [
        '(' => 0,
        ')' => 0,
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2,
        '^' => 3];

    $tree = new BinaryTree();

    $operand1 = '';
    $operand2 = '';

    for ($i = 0; $i < count($arrPolish); $i++) {
        $operand = $arrPolish[$i];

        if (is_null($operators[$operand])) {
            if (!$operand1) {
                $operand1 = $operand;
            } else {
                $operand2 = $operand;
            }
        } else {
            if (($operand1) && ($operand2)) {
                $tree->insertRoot($operand, $operand1, $operand2);
            } elseif ($operand1) {
                $tree->insertRoot($operand, '', $operand1);
            } else {
                $tree->insertRoot($operand, '', '');
            }

            $operand1 = '';
            $operand2 = '';
        }
    }

    //очищаем стек дерева чтобы при выводе в консоль не мешался
    $tree->clearStack();

    return $tree;
}

/**
 * @param $stack SplStack
 * @param $operators array
 * @param $char string
 * @param $res array
 * @return array
 */
function popStack(&$stack, $operators, $char, $res)
{
    while (true) {
        if ($stack->count() === 0) {
            break;
        }

        $charStack = $stack->pop();
        if ($charStack[1] < $operators[$char]) {
            $stack->push($charStack);
            break;
        } else {
            if ($charStack[0] !== '(') {
                array_push($res, $charStack[0]);
                //$res .= $charStack[0];
            }
        }
    }

    return $res;
}

function parseToPolish($strEval)
{
    $stack = new SplStack();
    $res = [];

    $operators = [
        '(' => 0,
        ')' => 0,
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2,
        '^' => 3];

    $currentOperand = '';

    for ($i = 0; $i < strlen($strEval); $i++) {

        $char = $strEval[$i];
        if (is_null($operators[$char])) {
            //число или переменная, на недопустимые символы не проверяем
            $currentOperand .= $char;
        } else {
            if ($currentOperand) {
                array_push($res, $currentOperand);
                $currentOperand = '';
            }

            //вытолкнуть из стека по приоритету
            $res = popStack($stack, $operators, $char, $res);

            if ($char !== ')') {
                $stack->push([$char, $operators[$char]]);
            }
        }
    }

    array_push($res, $currentOperand);
    //очищаем стек
    $res = popStack($stack, $operators, ')', $res);

    return $res;
}

$strEval = '(x+42)^2+7*y-z';

$arrPolish = parseToPolish($strEval);
print_r($arrPolish);

$tree = buildBynaryTree($arrPolish);
print_r($tree);

