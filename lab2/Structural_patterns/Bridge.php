<?php
// Абстракция
abstract class Abstraction {
    protected $implementor;

    public function __construct(Implementor $implementor) {
        $this->implementor = $implementor;
    }

    abstract public function operation(): string;
}

// Реализация абстракции
class ConcreteAbstraction extends Abstraction {
    public function operation(): string {
        return "Реализация абстракции с использованием: " . $this->implementor->operationImpl();
    }
}

// Интерфейс реализатора
interface Implementor {
    public function operationImpl(): string;
}

// Конкретный реализатор
class ConcreteImplementorA implements Implementor {
    public function operationImpl(): string {
        return "Конкретная реализация A";
    }
}

// Пример использования
$implementor = new ConcreteImplementorA();
$abstraction = new ConcreteAbstraction($implementor);
echo $abstraction->operation(); // Реализация абстракции с использованием: Конкретная реализация A
?>
