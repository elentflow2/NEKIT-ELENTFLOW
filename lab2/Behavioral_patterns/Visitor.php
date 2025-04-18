<?php
// Интерфейс посетителя
interface Visitor {
    public function visitConcreteElementA(ConcreteElementA $element): string;
    public function visitConcreteElementB(ConcreteElementB $element): string;
}

// Конкретный посетитель
class ConcreteVisitor implements Visitor {
    public function visitConcreteElementA(ConcreteElementA $element): string {
        return "Посетитель обработал элемент A";
    }

    public function visitConcreteElementB(ConcreteElementB $element): string {
        return "Посетитель обработал элемент B";
    }
}

// Абстрактный элемент
abstract class Element {
    abstract public function accept(Visitor $visitor): string;
}

// Конкретный элемент A
class ConcreteElementA extends Element {
    public function accept(Visitor $visitor): string {
        return $visitor->visitConcreteElementA($this);
    }
}

// Конкретный элемент B
class ConcreteElementB extends Element {
    public function accept(Visitor $visitor): string {
        return $visitor->visitConcreteElementB($this);
    }
}

// Пример использования
$visitor = new ConcreteVisitor();
$elementA = new ConcreteElementA();
$elementB = new ConcreteElementB();

echo $elementA->accept($visitor); // Посетитель обработал элемент A
echo $elementB->accept($visitor); // Посетитель обработал элемент B
?>
