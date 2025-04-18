<?php
// Интерфейс стратегии
interface Strategy {
    public function execute(): string;
}

// Конкретная стратегия A
class ConcreteStrategyA implements Strategy {
    public function execute(): string {
        return "Стратегия A: выполнение операции A";
    }
}

// Конкретная стратегия B
class ConcreteStrategyB implements Strategy {
    public function execute(): string {
        return "Стратегия B: выполнение операции B";
    }
}

// Контекст
class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function executeStrategy(): string {
        return $this->strategy->execute();
    }
}

// Пример использования
$context = new Context(new ConcreteStrategyA());
echo $context->executeStrategy(); // Стратегия A: выполнение операции A

$context->setStrategy(new ConcreteStrategyB());
echo $context->executeStrategy(); // Стратегия B: выполнение операции B
?>
