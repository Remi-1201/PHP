<?php

echo gettype(1) . PHP_EOL;
// integer
echo gettype('Hello,World') . PHP_EOL;
// string
echo gettype(true) . PHP_EOL;
// boolean

//================================

$number = '6';
echo gettype($number) . PHP_EOL;
// string

// intval は、与えられた値をinteger型に変換する関数
echo gettype(intval('6')) . PHP_EOL;
//integer