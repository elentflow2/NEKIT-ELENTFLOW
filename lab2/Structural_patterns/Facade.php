<?php
// Сложная система
class Subsystem1 {
    public function operation1(): string {
        return "Операция 1";
    }
}

class Subsystem2 {
    public function operation2(): string {
        return "Операция 2";
    }
}

class Subsystem3 {
    public function operation3(): string {
        return "Операция 3";
    }
}

// Фасад
class Facade {
    private $subsystem1;
    private $subsystem2;
    private $subsystem3;

    public function __construct() {
        $this->subsystem1 = new Subsystem1();
        $this->subsystem2 = new Subsystem2();
        $this->subsystem3 = new Subsystem3();
    }

    public function operation(): string {
        return $this->subsystem1->operation1() . ", " .
               $this->subsystem2->operation2() . ", " .
               $this->subsystem3->operation3();
    }
}

// Пример использования
$facade = new Facade();
echo $facade->operation(); // Операция 1, Операция 2, Операция 3
?>
