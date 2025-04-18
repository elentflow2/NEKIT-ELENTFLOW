<?php
require_once 'users.php';
require_once 'MarkdownView.php';

// Создание пользователей
$users = [];
$users[] = UserFactory::createUser('regular', 'Иван Иванов', 'ivan@example.com');
$users[] = UserFactory::createUser('admin', 'Мария Петрова', 'maria@example.com');
$users[] = UserFactory::createUser('regular', 'Сергей Смирнов', 'sergey@example.com');
$users[] = UserFactory::createUser('admin', 'Елена Сидорова', 'elena@example.com');
$users[] = UserFactory::createUser('regular', 'Дмитрий Кузнецов', 'dmitry@example.com');

// Рендеринг в формате Markdown
$view = new MarkdownView();
echo $view->render($users);
?>
