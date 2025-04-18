<?php
// Интерфейс субъекта
interface Subject {
    public function request(): string;
}

// Реальный субъект
class RealSubject implements Subject {
    public function request(): string {
        return "Запрос выполнен реальным субъектом.";
    }
}

// Прокси
class Proxy implements Subject {
    private $realSubject;

    public function __construct() {
        $this->realSubject = new RealSubject();
    }

    public function request(): string {
        return "Прокси: " . $this->realSubject->request();
    }
}

// Пример использования
$proxy = new Proxy();
echo $proxy->request(); // Прокси: Запрос выполнен реальным субъектом.
?>
