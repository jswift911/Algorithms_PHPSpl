<?php


namespace task1;

use task1\interfaces\treeable;

class Category implements treeable {

    private $id;
    private $name;
    private $level;

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
        $data = DB::getRow('SELECT * FROM `categories` WHERE `id_category` = ?', [$id]);
        $this->id = $data['id_category'];
        $this->name = $data['category_name'];
    }

    public static function getRootCategories() {
        $data = DB::getRows('SELECT * FROM `category_links` WHERE `level` = ?', [0]);
        $categories = [];
        foreach ($data as $row) {
            $cat = new Category($row['parent_id']);
            $cat->level = $data['level'];
            $categories[] = $cat;
        }
        return $categories;
    }

    public function getChildrens() {
        $data = DB::getRows('SELECT * FROM `category_links` WHERE `parent_id` = ? AND `level` = ?', [$this->id, $this->level + 1]);
        $categories = [];
        foreach ($data as $row) {
            $cat = new Category($row['child_id']);
            $cat->level = $this->level + 1;
            $categories[] = $cat;
        }
        return $categories;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId(int $id) {
        $this->id = $id;
    }

    function setName(string $name) {
        $this->name = $name;
    }

    function getLevel() {
        return $this->level;
    }

    function setLevel($level) {
        $this->level = $level;
    }

}
