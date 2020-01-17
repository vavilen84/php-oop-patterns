<?php

namespace Patterns\Singleton;

class A
{
    public $a = 1;

    protected static $singleton;

    public static function getInstance()
    {
        if (!self::$singleton instanceof A) {
            self::$singleton = new A();
        }
        return self::$singleton;
    }
}

$a = A::getInstance();
$a->a = 2;

var_dump(A::getInstance());