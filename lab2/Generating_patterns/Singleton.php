<?php
// Класс Singleton
class Singleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance(): Singleton {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// Пример использования
$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();
var_dump($singleton1 === $singleton2); // bool(true)
?>
