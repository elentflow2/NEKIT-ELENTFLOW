<?php
// Абстрактный класс для пользователя
abstract class User {
    protected $name;
    protected $email;

    abstract public function getDetails(): string;

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }
}

// Конкретный класс для пользователя
class RegularUser extends User {
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getDetails(): string {
        return "Пользователь: " . $this->name . ", Email: " . $this->email;
    }
}

// Конкретный класс для администраторов
class AdminUser extends User {
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getDetails(): string {
        return "Администратор: " . $this->name . ", Email: " . $this->email;
    }
}

// Фабричный метод для создания пользователей
class UserFactory {
    public static function createUser($type, $name, $email): User {
        if ($type === 'admin') {
            return new AdminUser($name, $email);
        }
        return new RegularUser($name, $email);
    }
}
?>
