<?php
// Интерфейс общего состояния
interface Flyweight {
    public function operation(): string;
}

// Конкретный легковес
class ConcreteFlyweight implements Flyweight {
    private $intrinsicState;

    public function __construct(string $intrinsicState) {
        $this->intrinsicState = $intrinsicState;
    }

    public function operation(): string {
        return "Легковес с состоянием: " . $this->intrinsicState;
    }
}

// Фабрика легковесов
class FlyweightFactory {
    private $flyweights = [];

    public function getFlyweight(string $state): Flyweight {
        if (!isset($this->flyweights[$state])) {
            $this->flyweights[$state] = new ConcreteFlyweight($state);
        }
        return $this->flyweights[$state];
    }
}

// Пример использования
$factory = new FlyweightFactory();
$flyweight1 = $factory->getFlyweight("Состояние 1");
$flyweight2 = $factory->getFlyweight("Состояние 1");
echo $flyweight1->operation(); // Легковес с состоянием: Состояние 1
var_dump($flyweight1 === $flyweight2); // bool(true) — объекты одинаковые
?>
