<?php
// Абстрактный посредник
abstract class Mediator {
    abstract public function send(string $message, Colleague $colleague): void;
}

// Коллега
class Colleague {
    protected $mediator;
    protected $name;

    public function __construct(Mediator $mediator, string $name) {
        $this->mediator = $mediator;
        $this->name = $name;
    }

    public function send(string $message): void {
        $this->mediator->send($message, $this);
    }

    public function receive(string $message): void {
        echo $this->name . " получил сообщение: " . $message . "\n";
    }
}

// Конкретный посредник
class ConcreteMediator extends Mediator {
    private $colleague1;
    private $colleague2;

    public function setColleague1(Colleague $colleague1): void {
        $this->colleague1 = $colleague1;
    }

    public function setColleague2(Colleague $colleague2): void {
        $this->colleague2 = $colleague2;
    }

    public function send(string $message, Colleague $colleague): void {
        if ($colleague === $this->colleague1) {
            $this->colleague2->receive($message);
        } else {
            $this->colleague1->receive($message);
        }
    }
}

// Пример использования
$mediator = new ConcreteMediator();
$colleague1 = new Colleague($mediator, "Коллега 1");
$colleague2 = new Colleague($mediator, "Коллега 2");

$mediator->setColleague1($colleague1);
$mediator->setColleague2($colleague2);

$colleague1->send("Привет, коллега 2!"); // Коллега 2 получил сообщение: Привет, коллега 2!
?>
