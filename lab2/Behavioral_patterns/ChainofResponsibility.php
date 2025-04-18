<?php
// Абстрактный обработчик
abstract class Handler {
    protected $nextHandler;

    public function setNext(Handler $handler): void {
        $this->nextHandler = $handler;
    }

    abstract public function handleRequest(int $request): string;
}

// Конкретный обработчик 1
class ConcreteHandler1 extends Handler {
    public function handleRequest(int $request): string {
        if ($request < 10) {
            return "Обработано обработчиком 1";
        } elseif ($this->nextHandler !== null) {
            return $this->nextHandler->handleRequest($request);
        }
        return "Запрос не обработан";
    }
}

// Конкретный обработчик 2
class ConcreteHandler2 extends Handler {
    public function handleRequest(int $request): string {
        if ($request < 20) {
            return "Обработано обработчиком 2";
        } elseif ($this->nextHandler !== null) {
            return $this->nextHandler->handleRequest($request);
        }
        return "Запрос не обработан";
    }
}

// Пример использования
$handler1 = new ConcreteHandler1();
$handler2 = new ConcreteHandler2();
$handler1->setNext($handler2);

echo $handler1->handleRequest(15); // Обработано обработчиком 2
?>
