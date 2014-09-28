<?php

function now()
{
    return microtime(true);
}

function foo()
{
    $i = 0;
    while ($i < 2) {
        echo "FOO (" . now() . "):\t" . (yield $i++) . "\n";
    }
}

function bar()
{
    $foo = foo();
    array('Hello', 'Michael', 'Bui');
    foreach (array('Hello', 'Michael', 'Bui') as $str) {
        $foo->send($str);
        sleep(2);
    }
}

bar();