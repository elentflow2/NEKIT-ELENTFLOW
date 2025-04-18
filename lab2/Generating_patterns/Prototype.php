<?php
// Интерфейс прототипа
interface Prototype {
    public function clone(): Prototype;
}

// Конкретный прототип
class ConcretePrototype implements Prototype {
    private $state;

    public function __construct(string $state) {
        $this->state = $state;
    }

    public function clone(): Prototype {
        return new ConcretePrototype($this->state);
    }

    public function getState(): string {
        return $this->state;
    }
}

// Пример использования
$original = new ConcretePrototype("Оригинальное состояние");
$cloned = $original->clone();
echo $cloned->getState(); // Оригинальное состояние
?>
