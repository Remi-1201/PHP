<?php

if (readline() >= 5){
    echo 'Hi' . PHP_EOL;
} else {
    echo 'Low' . PHP_EOL;
}

$number = readline();
if ($number >= 5){
    echo 'Hi' . PHP_EOL;
} else {
    echo 'Low' . PHP_EOL;
}

$number = readline('数字を入力してください' . PHP_EOL);
if ($number >=10) {
    echo 'Hi'. PHP_EOL;
}
elseif ($number >=5) {
    echo 'Middle'. PHP_EOL;
}
else {
    echo 'Low'. PHP_EOL;
}

$point = readline('１〜５の数字を入力してください。 ' . PHP_EOL);
if ($point < 1) {
    echo 'エラーです' . PHP_EOL;
}
elseif ($point > 5) {
    echo 'エラーです' . PHP_EOL;
}
else{
    echo 'ありがとうございます' . PHP_EOL;
}