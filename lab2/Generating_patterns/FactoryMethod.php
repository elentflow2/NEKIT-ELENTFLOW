<?php

interface Product {
    public function operation(): string;
}

class ConcreteProductA implements Product {
    public function operation(): string {
        return "Результат работы ConcreteProductA";
    }
}

class ConcreteProductB implements Product {
    public function operation(): string {
        return "Результат работы ConcreteProductB";
    }
}

abstract class Creator {
    abstract public function factoryMethod(): Product;

    public function someOperation(): string {
        $product = $this->factoryMethod();
        return "Creator: " . $product->operation();
    }
}

class ConcreteCreatorA extends Creator {
    public function factoryMethod(): Product {
        return new ConcreteProductA();
    }
}

class ConcreteCreatorB extends Creator {
    public function factoryMethod(): Product {
        return new ConcreteProductB();
    }
}

// Пример использования
$creator = new ConcreteCreatorA();
echo $creator->someOperation(); // Результат работы ConcreteProductA