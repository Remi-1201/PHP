<?php

php -a

php > echo 'Hello ' . 'World!';
Hello World!

php > echo 'Welcome ' . 'to ' . 'the ' . 'world ' . 'of ' . 'PHP!';
Welcome to the world of PHP!

$number = 1;
echo $number . PHP_EOL;
PHP_EOLは出力結果に改行を含めたい場合に使用します。

$number = 1;
echo $number + 3 . PHP_EOL; // 4

$width = 100;
$height = 50;
$area = $width * $height;
echo $area . PHP_EOL; // 5000

$number = 1;
$number = 3;
echo $number; // 3

$number = 1;
$number = $number + 3;  
echo $number . PHP_EOL; // 4

$age = 20;
var_dump($age < 30); // bool(true)
var_dump($age <= 15); // bool(false)
var_dump($age > 10); // bool(true)
var_dump($age > 30); // bool(false)
var_dump($age == 20); // bool(true)
var_dump($age != 20); // bool(false)

?>