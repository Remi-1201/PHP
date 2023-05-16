<?php

$favcourse = 'PHP';
switch ($favcourse) {
    case 'PHP':
        echo 'あなたの好きなコースはPHPです！' . PHP_EOL;
        break;
    case 'Ruby':
        echo 'あなたの好きなコースはRubyです！' . PHP_EOL;
        break;
    case 'Java':
        echo 'あなたの好きなコースはJavaです！' . PHP_EOL;
        break;
    default:
        echo 'お気に入りのコースは、Java、Ruby、またはPHPではありません。' . PHP_EOL;
}
// あなたの好きなコースはPHPです！

$foo = 0;
switch ($foo) {
    case false:
        echo '$foo is false' . PHP_EOL;
        break;
    case 0:
        echo '$foo is 0' . PHP_EOL;
        break;
    case null:
        echo '$foo is null' . PHP_EOL;
        break;
    default:
        echo 'default' . PHP_EOL;
}
// $foo is false

// forで繰り返す ======================

for ($x = 0; $x <= 5; $x++) {
  echo $x . PHP_EOL;
}
// 0 ~ 5

// forEachで繰り返す ======================

forEach (配列 as 要素) {
  // 反復処理
}

$arr = [1, 2, 3, 4, 5, 6, 7];
forEach ($arr as $value) {
    echo $value . PHP_EOL;
}
// 1 ~ 7

// unset関数 ======================
$arr = [1, 2, 3, 4, 5, 6, 7];
　
forEach ($arr as $value) {
    echo $value . PHP_EOL;
}
// 1 ~ 7

unset($value); 
// unset()で参照を解除できる

echo $value . PHP_EOL;  
// ループの外で$valueを出力する
// Warning: Undefined variable $value

// 各要素のインデックス取得 ======================
forEach (配列 as インデックス => 要素) {
    // 反復処理
}

$arr = [1, 2, 3, 4, 5, 6, 7];

forEach ($arr as $index => $value) {
    echo $index . ":" . $value . PHP_EOL;
}

// 0:1
// 1:2
// 2:3
// 3:4
// 4:5
// 5:6
// 6:7

// 連想配列に対しても forEach が使用できます ======
$arr = [
    'name'    => 'tanaka',
    'age'     => 30,
    'address' => 'Tokyo'
];

forEach ($arr as $key => $value) {
    echo $key . ': ' . $value . PHP_EOL;
}

// name: tanaka
// age: 30
// address: Tokyo

// 繰り返し構文の中で使われる装飾子 break =================
for ($x = 0; $x < 10; $x++) {
    if ($x === 4) {
        break;
    }
    echo "The number is: $x" . PHP_EOL;
}

// The number is: 0
// The number is: 1
// The number is: 2
// The number is: 3

// continue =================
$i = 0;
while ($i++ < 5) {
    echo '外側の反復処理' . $i . '回目'. PHP_EOL;
    while (true) {
        echo '内側の反復処理' . $i . '回目' . PHP_EOL;
        continue 2; // 2階層目の反復処理をスキップ
    }
    echo '出力されないコメント' . PHP_EOL;
}

// 外側の反復処理1回目
// 内側の反復処理1回目
// 外側の反復処理2回目
// 内側の反復処理2回目
// 外側の反復処理3回目
// 内側の反復処理3回目
// 外側の反復処理4回目
// 内側の反復処理4回目
// 外側の反復処理5回目
// 内側の反復処理5回目