<?php
class Foo
{
    public function __debugInfo()
    {
        return ['Hello World'];
    }
}

var_dump(new Foo());