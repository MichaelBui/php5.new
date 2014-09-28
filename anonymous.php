<?php
class FooClass
{
    public function out($message)
    {
        echo "Foo:\t" . $message . "\n";
    }

    public function anon53($message)
    {
        $that = $this;
        return function() use ($message, $that)
        {
            $that->out($message);
        };
    }

    public function anon54($message)
    {
        return function() use ($message)
        {
            $this->out($message);
        };
    }

    public function foo($is53 = true)
    {
        $message = 'Michael Bui';
        $anon = $is53 ? $this->anon53($message) : $this->anon54($message);
        $anon();
    }
}

class BarClass
{
    protected function out($message)
    {
        echo "Bar:\t" . $message . "\n";
    }
}

$foo = new FooClass();
$foo->foo();

// Rebinding $this
$bar = new BarClass();
$closure = $foo->anon54('Hello World');
$newClosure = $closure->bindTo($bar, $bar);
$newClosure();