<?php
// MyProject/Classes/User.php
namespace MyProject\Classes;

class User {
    public $name;
    public $login;
    private $password;
    public static $count = 0;

    public function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$count++;
    }

    public function showInfo() {
        echo "<pre>Информация о пользователе:\n";
        echo "Имя: $this->name | Логин: $this->login";
    }

    public static function getUserCount() {
        return self::$count;
    }

    public function __destruct() {
        echo "Пользователь $this->login удален.\n";
    }
}
