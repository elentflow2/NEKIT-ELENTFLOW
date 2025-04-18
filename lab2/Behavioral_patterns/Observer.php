<?php
// Интерфейс Наблюдателя
interface Observer {
    public function update(string $state): void;
}

// Конкретный наблюдатель
class ConcreteObserver implements Observer {
    private $state;

    public function update(string $state): void {
        $this->state = $state;
        echo "Состояние обновлено на: " . $this->state . "\n";
    }
}

// Интерфейс субъекта
interface Subject {
    public function addObserver(Observer $observer): void;
    public function removeObserver(Observer $observer): void;
    public function notifyObservers(): void;
}

// Конкретный субъект
class ConcreteSubject implements Subject {
    private $observers = [];
    private $state;

    public function addObserver(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer): void {
        $this->observers = array_filter($this->observers, fn($o) => $o !== $observer);
    }

    public function notifyObservers(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this->state);
        }
    }

    public function setState(string $state): void {
        $this->state = $state;
        $this->notifyObservers();
    }
}

// Пример использования
$subject = new ConcreteSubject();
$observer = new ConcreteObserver();

$subject->addObserver($observer);
$subject->setState("Новое состояние"); // Состояние обновлено на: Новое состояние
?>
