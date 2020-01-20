<?php

namespace Patterns\AbstractFactory;

interface ProductA
{
}

interface ProductB
{
}

class A implements Product
{
}

class B implements Product
{
}

interface AbstractFactory
{
    public function createProductA(): ProductA;

    public function createProductB(): ProductB;
}

class ConcreteFactory implements AbstractFactory
{
    public function createProductA(): ProductA
    {
        return new A();
    }

    public function createProductB(): ProductB
    {
        return new B();
    }
}

$abstractFactory = new ConcreteFactory();
$a = $abstractFactory->createProductA();
var_dump($a);

