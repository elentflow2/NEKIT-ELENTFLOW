<?php
// Продукт
class Product {
    private $parts = [];

    public function addPart(string $part) {
        $this->parts[] = $part;
    }

    public function show() {
        echo "Продукт состоит из: " . implode(", ", $this->parts) . "\n";
    }
}

// Абстрактный строитель
interface Builder {
    public function buildPart1(): void;
    public function buildPart2(): void;
    public function getResult(): Product;
}

// Конкретный строитель
class ConcreteBuilder implements Builder {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function buildPart1(): void {
        $this->product->addPart("Часть 1");
    }

    public function buildPart2(): void {
        $this->product->addPart("Часть 2");
    }

    public function getResult(): Product {
        return $this->product;
    }
}

// Директор
class Director {
    private $builder;

    public function __construct(Builder $builder) {
        $this->builder = $builder;
    }

    public function construct() {
        $this->builder->buildPart1();
        $this->builder->buildPart2();
    }
}

// Пример использования
$builder = new ConcreteBuilder();
$director = new Director($builder);
$director->construct();
$product = $builder->getResult();
$product->show(); // Продукт состоит из: Часть 1, Часть 2
?>
