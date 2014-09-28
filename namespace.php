<?php

# Definition
namespace Interfaces {
    interface OutInterface
    {
        public function out($message);
    }
}

namespace FooNamespace {

    use Interfaces\OutInterface;

    const FOO = 'FooNamespace\FooClass::foo()';

    function var_dump($message)
    {
        echo $message . "\n";
    }

    class Base implements OutInterface
    {
        public function out($message)
        {
            echo "Foo:\t" . $message . "\n";
        }
    }

    class FooClass extends Base
    {
        public function foo()
        {
            $this->out(FOO);
        }
    }
}

# Test running
namespace
{
    use FooNamespace\FooClass;
//    use const FooNamespace\FOO; // PHP v5.6
//    use function FooNamespace\var_dump; // PHP v5.6

    if (!defined('FOO')) {
        define('FOO', 'Global FOO');
    }

    $foo = new FooClass();
    $foo->foo();
    var_dump(FOO);
}