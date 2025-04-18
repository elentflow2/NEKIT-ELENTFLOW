<?php

interface AbstractProductA {
    public function usefulFunctionA(): string;
}

interface AbstractProductB {
    public function usefulFunctionB(): string;
    public function collaborate(AbstractProductA $collaborator): string;
}

class ConcreteProductA1 implements AbstractProductA {
    public function usefulFunctionA(): string {
        return "Результат работы ConcreteProductA1";
    }
}

class ConcreteProductA2 implements AbstractProductA {
    public function usefulFunctionA(): string {
        return "Результат работы ConcreteProductA2";
    }
}

class ConcreteProductB1 implements AbstractProductB {
    public function usefulFunctionB(): string {
        return "Результат работы ConcreteProductB1";
    }

    public function collaborate(AbstractProductA $collaborator): string {
        return "ConcreteProductB1 сотрудничает с: " . $collaborator->usefulFunctionA();
    }
}

class ConcreteProductB2 implements AbstractProductB {
    public function usefulFunctionB(): string {
        return "Результат работы ConcreteProductB2";
    }

    public function collaborate(AbstractProductA $collaborator): string {
        return "ConcreteProductB2 сотрудничает с: " . $collaborator->usefulFunctionA();
    }
}

interface AbstractFactory {
    public function createProductA(): AbstractProductA;
    public function createProductB(): AbstractProductB;
}

class ConcreteFactory1 implements AbstractFactory {
    public function createProductA(): AbstractProductA {
        return new ConcreteProductA1();
    }

    public function createProductB(): AbstractProductB {
        return new ConcreteProductB1();
    }
}

class ConcreteFactory2 implements AbstractFactory {
    public function createProductA(): AbstractProductA {
        return new ConcreteProductA2();
    }

    public function createProductB(): AbstractProductB {
        return new ConcreteProductB2();
    }
}

// Пример использования
$factory = new ConcreteFactory1();
$productA = $factory->createProductA();
$productB = $factory->createProductB();
echo $productB->collaborate($productA); // ConcreteProductB1 сотрудничает с: Результат работы ConcreteProductA1