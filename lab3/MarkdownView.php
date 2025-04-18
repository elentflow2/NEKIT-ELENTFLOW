<?php
// Представление Markdown
class MarkdownView {
    public function render(array $users): string {
        $markdown = "# Список пользователей<br>";
        foreach ($users as $user) {
            $markdown .= "## " . $user->getName() . "<br>";
            $markdown .= "* Email: " . $user->getEmail() . "<br>";
            $markdown .= "* Роль: " . (get_class($user) == 'AdminUser' ? 'Администратор' : 'Пользователь') . "<br><br>";
        }
        return $markdown;
    }
}
?>
