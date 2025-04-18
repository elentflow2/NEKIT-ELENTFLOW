<?php
// Абстрактный класс с шаблонным методом
abstract class AbstractClass {
    public function templateMethod(): string {
        return $this->stepOne() . " " . $this->stepTwo();
    }

    protected function stepOne(): string {
        return "Шаг 1: Выполнение общего действия";
    }

    abstract protected function stepTwo(): string; // Этот метод должен быть реализован в подклассе
}

// Конкретный класс
class ConcreteClass extends AbstractClass {
    protected function stepTwo(): string {
        return "Шаг 2: Выполнение специфического действия";
    }
}

// Пример использования
$instance = new ConcreteClass();
echo $instance->templateMethod(); // Шаг 1: Выполнение общего действия Шаг 2: Выполнение специфического действия
?>
