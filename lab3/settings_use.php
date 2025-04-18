<?php
// Класс Settings (Одиночка)
class Settings {
    private static $instance = null;
    private $settings = [];

    // Приватный конструктор
    private function __construct() {}

    // Приватный метод клонирования
    private function __clone() {}

    // Метод получения единственного экземпляра
    public static function getInstance(): Settings {
        if (self::$instance === null) {
            self::$instance = new Settings();
        }
        return self::$instance;
    }

    // Метод для установки значений
    public function set($key, $value): void {
        $this->settings[$key] = $value;
    }

    // Метод для получения значений
    public function get($key) {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }
}

// Пример использования
$settings = Settings::getInstance();
$settings->set('integer', 123);
$settings->set('string', 'Hello, World!');
$settings->set('boolean', true);

// Вывод значений
echo "Число: " . $settings->get('integer') . "<br>";
echo "Строка: " . $settings->get('string') . "<br>";
echo "Логическое значение: " . ($settings->get('boolean') ? 'true' : 'false') . "<br>";
?>
