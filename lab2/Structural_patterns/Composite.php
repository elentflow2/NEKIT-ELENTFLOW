<?php
// Абстракция компонента
abstract class Component {
    protected $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    abstract public function show(): void;
}

// Лист
class Leaf extends Component {
    public function show(): void {
        echo "Лист: " . $this->name . "\n";
    }
}

// Композит
class Composite extends Component {
    private $children = [];

    public function add(Component $component): void {
        $this->children[] = $component;
    }

    public function show(): void {
        echo "Композит: " . $this->name . "\n";
        foreach ($this->children as $child) {
            $child->show();
        }
    }
}

// Пример использования
$leaf1 = new Leaf("Лист 1");
$leaf2 = new Leaf("Лист 2");

$composite = new Composite("Корень");
$composite->add($leaf1);
$composite->add($leaf2);
$composite->show();
?>
