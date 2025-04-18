<?php
// Интерфейс состояния
interface State {
    public function handle(): string;
}

// Конкретное состояние 1
class ConcreteStateA implements State {
    public function handle(): string {
        return "Обработка в состоянии A";
    }
}

// Конкретное состояние 2
class ConcreteStateB implements State {
    public function handle(): string {
        return "Обработка в состоянии B";
    }
}

// Контекст
class Context {
    private $state;

    public function __construct(State $state) {
        $this->state = $state;
    }

    public function setState(State $state): void {
        $this->state = $state;
    }

    public function request(): string {
        return $this->state->handle();
    }
}

// Пример использования
$context = new Context(new ConcreteStateA());
echo $context->request(); // Обработка в состоянии A

$context->setState(new ConcreteStateB());
echo $context->request(); // Обработка в состоянии B
?>
