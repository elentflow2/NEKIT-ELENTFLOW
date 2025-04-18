<?php
require_once 'users.php';

// Добавление пользователей
$users = [];
$users[] = UserFactory::createUser('regular', 'Иван Иванов', 'ivan@example.com');
$users[] = UserFactory::createUser('admin', 'Мария Петрова', 'maria@example.com');
$users[] = UserFactory::createUser('regular', 'Сергей Смирнов', 'sergey@example.com');
$users[] = UserFactory::createUser('admin', 'Елена Сидорова', 'elena@example.com');
$users[] = UserFactory::createUser('regular', 'Дмитрий Кузнецов', 'dmitry@example.com');

// Вывод информации о пользователях
foreach ($users as $user) {
    echo $user->getDetails() . "<br>";
}
?>
