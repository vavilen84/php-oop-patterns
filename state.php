<?php
namespace Patterns\State;

interface State
{
    public function setContext(Context $context): void;

    public function handle(): void;
}

class Context
{
    protected $state;

    public function setState(State $state): void
    {
        $this->state = $state;
        $this->state->setContext($this);
    }

    public function request(): void
    {
        $this->state->handle();
    }
}

class BaseState
{
    protected $context;

    public function setContext(Context $context): void
    {
        $this->context = $context;
    }
}

class ConcreteStateA extends BaseState implements State
{
    public function handle(): void
    {
        echo "A";
        $this->context->setState(new ConcreteStateB());
    }
}

class ConcreteStateB extends BaseState implements State
{
    public function handle(): void
    {
        echo "B";
    }
}

$context = new Context();
$context->setState(new ConcreteStateA());

$context->request();
$context->request();