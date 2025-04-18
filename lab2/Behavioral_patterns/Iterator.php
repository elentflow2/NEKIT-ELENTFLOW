<?php
// Интерфейс итератора
interface Iterator {
    public function hasNext(): bool;
    public function next(): string;
}

// Конкретный итератор
class ConcreteIterator implements Iterator {
    private $items = [];
    private $position = 0;

    public function __construct(array $items) {
        $this->items = $items;
    }

    public function hasNext(): bool {
        return isset($this->items[$this->position]);
    }

    public function next(): string {
        if ($this->hasNext()) {
            return $this->items[$this->position++];
        }
        return null; // Если элементов больше нет, возвращаем null
    }
}

// Коллекция
class Collection {
    private $items = [];

    public function addItem(string $item): void {
        $this->items[] = $item;
    }

    public function getIterator(): Iterator {
        return new ConcreteIterator($this->items);
    }
}

// Пример использования
$collection = new Collection();
$collection->addItem("Элемент 1");
$collection->addItem("Элемент 2");
$collection->addItem("Элемент 3");

$iterator = $collection->getIterator();
while ($iterator->hasNext()) {
    echo $iterator->next() . "\n"; // Элемент 1, Элемент 2, Элемент 3
}
?>
