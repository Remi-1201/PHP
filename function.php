<?php

function greeting() {
    echo "おはようございます" . PHP_EOL;
    echo "こんにちは" . PHP_EOL;
    echo "こんばんは" . PHP_EOL;
}

greeting();
// おはようございます
// こんにちは
// こんばんは

//===============================================================

function inputPoint() {
  $count = 1;
  while ($count <= 10) {
      $point = readline('1〜5の数字を入力してください。' . PHP_EOL);

      if ($point < 1) {
          echo 'エラーです' . PHP_EOL;
      }
      elseif ($point > 5) {
          echo 'エラーです' . PHP_EOL;
      }
      else {
          echo 'ありがとうございます' . PHP_EOL;
      }
      $count =  $count + 1;
  }
}

inputPoint();

//===============================================================

function doubling($number) { # 仮引数として $number が設定されています
  echo $number * 2 . PHP_EOL;
}

doubling(5); # 実引数として5を渡しています
//10

//===============================================================

function add($n, $y) {
  return $n + $y;
}

echo add(2, 3) . PHP_EOL; // 5

//===============================================================

function add($n, $y){
  $n + $y;
  return $n;
}

echo add(2, 3) . PHP_EOL; // 2