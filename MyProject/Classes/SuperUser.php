<?php
// MyProject/Classes/SuperUser.php
namespace MyProject\Classes;

require_once 'User.php';

class SuperUser extends User {
    public $role;
    public static $count = 0;

    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$count++;
    }

    public function showInfo() {
        echo "<pre>Информация о пользователе:\n";
        echo "Имя: $this->name | Логин: $this->login | Роль: $this->role\n";
    }

    public function getInfo() {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'role' => $this->role
        ];
    }

    public static function getSuperUserCount() {
        return self::$count;
    }
}
