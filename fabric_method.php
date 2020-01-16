<?php

const TYPE_A = 1;
const TYPE_B = 2;

interface Product
{
    public function getName(): string;
}

interface Creator
{
    public function fabricMethod(int $type): Product;
}

class Base implements Product
{
    public function getName(): string
    {
        return __CLASS__;
    }
}

class A extends Base
{

}

class B extends Base
{

}

class ConcreteCreator implements Creator
{
    public function fabricMethod(int $type): Product
    {
        switch ($type) {
            case TYPE_A:
                return new A();
                break;
            case TYPE_B:
                return new B();
                break;
        }
    }
}

$creator = new ConcreteCreator();
$result = $creator->fabricMethod(TYPE_A);
var_dump($result);


