<?php
function foo($verb, ...$params)
{
    echo $verb . ":\t" . implode('_', $params) . "\n";
}

foo('Hello', 'World');
foo('Hi', 'Michael', 'Bui');
foo('Hello', ...['Michael', 'Bui'], ...[28, 12]);