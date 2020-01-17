<?php

namespace Patterns\AbstractFactory;

interface Product
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
    public function createProductA(): Product;

    public function createProductB(): Product;
}

class ConcreteFactory implements AbstractFactory
{
    public function createProductA(): Product
    {
        return new A();
    }

    public function createProductB(): Product
    {
        return new B();
    }
}

$abstractFactory = new ConcreteFactory();
$a = $abstractFactory->createProductA();
var_dump($a);

