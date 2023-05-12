<?php

# 変数diveに1を代入する
$dive = 1;
# 値が5以上になると条件式(dive < 5)がfalseになり、処理が終了する
while ($dive < 10){
  # 処理内容
  echo $dive. PHP_EOL;
  # ループごとに変数diveに1を加算
  $dive = $dive + 1;
}
// 結果
// 1
// 2
// 3
// 4

// ----------------------------------

$dive = 1;
while ($dive < 5){
    echo $dive. PHP_EOL;;
    break; // 1
    $dive = $dive + 1;

$dive = 1;
while ($dive < 5){
    # ここから処理を追加
    if ($dive == 3){
        echo '終了' . PHP_EOL;
        break;
    }
    # ここまで処理を追加
    echo $dive . PHP_EOL;
    $dive = $dive + 1;
    }
// 結果
// 1
// 2
// 終了

// ----------------------------------

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

// ----------------------------------

$count = 1;
// 実行回数を管理する変数$countを定義し、初期値1を設定する
while ($count <= 10) {
  // 実行回数が10以下の間、while内の処理を繰り返し実行する
  $point = readline('1〜5の数字を入力してください。 ' . PHP_EOL);
  if ($point < 1) {
      echo 'エラーです' . PHP_EOL;
  }
  elseif ($point > 5) {
      echo 'エラーです' . PHP_EOL;
  }
  else{
      echo 'ありがとうございます' . PHP_EOL;
  }
  $count = $count + 1;
  // 実行回数の変数$countに1を加算する
}

// ----------------------------------

