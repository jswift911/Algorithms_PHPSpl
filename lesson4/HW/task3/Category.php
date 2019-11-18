<?php

/*
 *  If this code works then Fuchko Nikita wrote it, if not then I do not know who did it ... ^-^
 */

namespace task3;

use task3\interfaces\treeable;

class Category implements treeable {

    private $id;
    private $level;
    private $left;
    private $right;

    public function __get($name) {
        $method = 'get' . $name;
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function __set($name, $value) {
        $method = 'set' . $name;
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    function __construct(int $id = null) {
        if (!empty($id)) {
            $this->load($id);
        }
    }

    public function load($id) {
        $data = DB::getRow('SELECT * FROM `nested` WHERE `id` = ?', [$id]);
        $this->id = $data['id'];
        $this->level = $data['level'];
        $this->left = $data['nleft'];
        $this->right = $data['nright'];
    }

    public static function getRootCategories() {
        $data = DB::getRows('SELECT * FROM `nested` WHERE `level` = ?', [3]);
        $categories = [];
        foreach ($data as $row) {
            $cat = new Category($row['id']);
            $categories[] = $cat;
        }
        return $categories;
    }

    public function getChildrens() {
        $data = DB::getRows('SELECT * FROM `nested` WHERE `nleft` > ? AND `nright` < ? AND `level` = ?;', [$this->left, $this->right, $this->level + 1]);
        $categories = [];
        foreach ($data as $row) {
            $cat = new Category($row['id']);
            $categories[] = $cat;
        }
        return $categories;
    }

    function getId() {
        return $this->id;
    }

    function getLevel() {
        return $this->level;
    }

    function getLeft() {
        return $this->left;
    }

    function getRight() {
        return $this->right;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLevel($level) {
        $this->level = $level;
    }

    function setLeft($left) {
        $this->left = $left;
    }

    function setRight($right) {
        $this->right = $right;
    }

    public function __toString() {
        return "<b>$this->id</b> (level:$this->level, left:$this->left, right:$this->right)";
    }

}
