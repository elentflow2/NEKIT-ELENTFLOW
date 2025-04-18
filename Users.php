<?php

spl_autoload_register(function ($class) {
    $prefix = 'MyProject\\Classes\\';
    $base_dir = __DIR__ . '/MyProject/Classes/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Используем классы
use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

$user1 = new User("Некит", "Nekit", "password1");
$user2 = new User("Олег", "Oleg", "password2");
$user3 = new User("elentflow", "elentflow", "password3");
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

$user4 = new SuperUser ("Afrodita", "Афродита", "superpass", "admin");
$user4->showInfo();
print_r($user4->getInfo());

echo "Всего обычных пользователей: " . User::getUserCount() . "\n";
echo "Всего супер-пользователей: " . SuperUser::getSuperUserCount() . "\n";
