<?php
// Интерфейс команды
interface Command {
    public function execute(): string;
}

// Конкретная команда
class ConcreteCommand implements Command {
    private $receiver;

    public function __construct(Receiver $receiver) {
        $this->receiver = $receiver;
    }

    public function execute(): string {
        return $this->receiver->action();
    }
}

// Получатель
class Receiver {
    public function action(): string {
        return "Действие выполнено получателем";
    }
}

// Инвокер
class Invoker {
    private $command;

    public function setCommand(Command $command): void {
        $this->command = $command;
    }

    public function invoke(): string {
        return $this->command->execute();
    }
}

// Пример использования
$receiver = new Receiver();
$command = new ConcreteCommand($receiver);
$invoker = new Invoker();
$invoker->setCommand($command);
echo $invoker->invoke(); // Действие выполнено получателем
?>
