<?php
// Интерфейс компонента
interface Component {
    public function operation(): string;
}

// Конкретный компонент
class ConcreteComponent implements Component {
    public function operation(): string {
        return "Операция компонента";
    }
}

// Декоратор
class Decorator implements Component {
    protected $component;

    public function __construct(Component $component) {
        $this->component = $component;
    }

    public function operation(): string {
        return "Декорированная операция: " . $this->component->operation();
    }
}

// Пример использования
$component = new ConcreteComponent();
$decorated = new Decorator($component);
echo $decorated->operation(); // Декорированная операция: Операция компонента
?>
