<?php
// Снимок
class Memento {
    private $state;

    public function __construct(string $state) {
        $this->state = $state;
    }

    public function getState(): string {
        return $this->state;
    }
}

// Источник
class Originator {
    private $state;

    public function setState(string $state): void {
        $this->state = $state;
    }

    public function saveStateToMemento(): Memento {
        return new Memento($this->state);
    }

    public function restoreStateFromMemento(Memento $memento): void {
        $this->state = $memento->getState();
    }

    public function getState(): string {
        return $this->state;
    }
}

// Хранитель
class Caretaker {
    private $memento;

    public function saveMemento(Memento $memento): void {
        $this->memento = $memento;
    }

    public function getMemento(): Memento {
        return $this->memento;
    }
}

// Пример использования
$originator = new Originator();
$originator->setState("Состояние 1");

$caretaker = new Caretaker();
$caretaker->saveMemento($originator->saveStateToMemento());

$originator->setState("Состояние 2");
echo $originator->getState(); // Состояние 2

$originator->restoreStateFromMemento($caretaker->getMemento());
echo $originator->getState(); // Состояние 1
?>
