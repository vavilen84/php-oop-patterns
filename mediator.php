<?php

/**
 * Mediator
 */

const CALL_A = 1;
const CALL_B = 2;
const CALL_A_B = 3;

interface Mediator
{
    public function notify(string $event): void;
}

class ConcreteMediator implements Mediator
{

    protected $a;

    protected $b;

    public function __construct(A $a, B $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function notify(string $event): void
    {
        switch ($event) {
            case CALL_A:
                $this->a->doA();
                break;
            case CALL_B:
                $this->b->doB();
                break;
            case CALL_A_B:
                $this->a->doA();
                $this->b->doB();
                break;
        }
    }
}

class Base
{
    protected $mediator;

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }

    public function triggerEvent(string $event): void
    {
        $this->mediator->notify($event);
    }
}

class A extends Base
{
    public function doA(): void
    {
        echo "call A -> doA()";
    }
}

class B extends Base
{
    public function doB(): void
    {
        echo "call B -> doB()";
    }
}

$a = new A();
$b = new B();

$mediator = new ConcreteMediator($a, $b);

$a->setMediator($mediator);
$b->setMediator($mediator);

$a->triggerEvent(CALL_A_B);


