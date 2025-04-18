<?php
// Интерфейс целевого класса
interface Target {
    public function request(): string;
}

// Класс-адаптер
class Adapter implements Target {
    private $adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function request(): string {
        return $this->adaptee->specificRequest();
    }
}

// Класс, к которому требуется адаптация
class Adaptee {
    public function specificRequest(): string {
        return "Специфический запрос";
    }
}

// Пример использования
$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);
echo $adapter->request(); // Специфический запрос
?>
