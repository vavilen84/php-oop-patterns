<?php

namespace Patterns\Strategy;

interface Strategy
{
    public function doSomething(array $data = []): void;
}

class Context
{
    protected $strategy;

    public function setStrategy(Strategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function handle(array $data = [])
    {
        if ($this->strategy instanceof Strategy) {
            $this->strategy->doSomething($data);
        }
    }
}

class StrategyA implements Strategy
{
    public function doSomething(array $data = []): void
    {
        echo "A";
    }
}

class StrategyB implements Strategy
{
    public function doSomething(array $data = []): void
    {
        echo "B";
    }
}

$context = new Context();
$context->setStrategy(new StrategyA());
$context->handle();
$context->setStrategy(new StrategyB());
$context->handle();