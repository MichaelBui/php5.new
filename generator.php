<?php
function gen()
{
    yield 'Hello';
    yield 'World';
}

$gen = gen();
foreach ($gen as $str) {
    echo "Generator:\t" . $str . "\n";
}