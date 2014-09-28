<?php
function out($message)
{
    echo "->\t" . $message . "\n";
}

trait Foo
{
    public function foo()
    {
        out('FOO');
    }

    public function hello()
    {
        out('Hello Foo');
    }
}

trait Bar
{
    public function bar()
    {
        out('BAR');
    }

    public function hello()
    {
        out('Hello Bar');
    }
}

class Test
{
    use Foo, Bar {
        Foo::hello insteadof Bar;
        Bar::hello as protected helloBar;
    }

    public function test()
    {
        $this->foo();
        $this->bar();
        $this->hello();
        $this->helloBar();
    }
}

$test = new Test();
var_dump(class_uses('Test'));