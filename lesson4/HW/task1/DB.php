<?php

namespace task1;

class DB {

    const DB_HOST = 'localhost';
    const DB_NAME = 'php3';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_CHAR = 'utf8';

    protected static $instance = null;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    private static function instance() {
        if (self::$instance === null) {
            $opt = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => TRUE,
            );
            $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=' . self::DB_CHAR;
            self::$instance = new \PDO($dsn, self::DB_USER, self::DB_PASS, $opt);
        }
        return self::$instance;
    }

    private static function sql($sql, $args = []) {
        echo "<pre>".$sql."</pre>";
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public static function getRows($sql, $args = []) {
        return self::sql($sql, $args)->fetchAll();
    }


    public static function getRow($sql, $args = []) {
        return self::sql($sql, $args)->fetch();
    }


    public static function insert($sql, $args = []) {
        self::sql($sql, $args);
        return self::instance()->lastInsertId();
    }


    public static function update($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }


    public static function delete($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }

}
