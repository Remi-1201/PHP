<?php

// 関数の定義
function calculateTriangleArea($vertical, $width) {
    return ($vertical * $width) / 2;
}
// 呼び出し
echo calculateTriangleArea(10, 20) . PHP_EOL;

// ================================================
$number_of_sides = 3; // 辺の数
$vertical = 10; // 縦
$width = 20; //横

switch ($number_of_sides) {
    case 3: // 三角形の場合
        echo $vertical * $width / 2 . PHP_EOL;
        break;
    case 4: // 四角形の場合
        echo $vertical * $width . PHP_EOL;
        break;
    default:
        echo '計算できません' . PHP_EOL;
}

// case の後に直接処理の内容を記述すると、
// 何をしているのかわかりづらい ========================
// 関数を使ってみましょう 

// 三角形の面積を求める関数
function calculateTriangleArea($vertical, $width) {
  return ($vertical * $width) / 2;
}

// 四角形の面積を求める関数
function calculateQuadrangleArea($vertical, $width) {
  return $vertical * $width; 
}

$number_of_sides = 3; // 辺の数
$vertical = 10; // 縦
$width = 20; // 横

switch ($number_of_sides) {
  case 3:
      echo calculateTriangleArea($vertical, $width) . PHP_EOL;
      break;
  case 4:
      echo calculateQuadrangleArea($vertical, $width) . PHP_EOL;
      break;
  default:
      echo '計算できません' . PHP_EOL;
}

// デフォルト値を設定する =============================
// 三角形の面積を求める関数
function calculateTriangleArea($vertical = 10, $width = 50) {
  return ($vertical * $width) / 2;
}

// 引数にあらかじめデフォルト値を設定できます。
// 使用時に引数を設定しなければデフォルト値が使用され、
// 引数を定義すると、その引数が使われます。

echo calculateTriangleArea() . PHP_EOL; 
// 引数を省略して実行
// 250
echo calculateTriangleArea(20, 30) . PHP_EOL; 
// 引数を渡して実行
// 300

// 名前付き引数 ======================================
// 引数が何を意味するのか、
// どんな値を引数として渡せばよいのかをわかりやすくするために、
// 関数呼び出し時に名前と一緒に引数を書くことができる引数があります。それが名前付き引数です。
function calculateArea($vertical = 10, $width = 50, $triangle = true) {
  $area = $vertical * $width;
  return $triangle ? $area / 2 : $area;
}
// 名前と一緒に引数を渡します
echo calculateArea(vertical: 20, width: 50, triangle: true) . PHP_EOL
// デフォルト値を使用する場合は省略できます。
echo calculateArea(width: 100) . PHP_EOL; 
// 500

// 名前付き引数を使わない場合、関数に定義されている順番で引数を記述しなければなりません。
// 一方で、名前付き引数を設定している場合は順番を変えることができます。
function calculateArea($vertical = 10, $width = 50, $triangle = true) {
  $area = $vertical * $width;
  return $triangle ? $area / 2 : $area;
}

echo calculateArea(triangle: false, width: 100) 
// 1000

// 名前付き引数を使い、かつデフォルト値を省略することもできます。
function calculateArea($vertical, $width, $triangle) {
  $area = $vertical * $width;
  return $triangle ? $area / 2 : $area;
}

echo calculateArea(vertical: 10, width: 50, triangle: true) . PHP_EOL;

// 可変長引数==========================================
// 引数の数を制限せず受け取る
function shopping(...$products){
  print_r ($products);
}

shopping("milk", "apple", "banana");
// Array
// (
//     [0] => milk
//     [1] => apple
//     [2] => banana
// )

// ==========================================
function shopping($store, ...$products){
  print_r($store . 'で買ったもの' . PHP_EOL);
  print_r($products);
  
}

shopping('DICスーパー', 'milk', 'apple', 'banana');
// DICスーパーで買ったもの
// Array
// (
//     [0] => milk
//     [1] => apple
//     [2] => banana
// )

// ArgumentCountError ==========================================
// 引数が期待通りでないときに起こるエラー
function calculateTriangleArea($vertical, $width){
  return $vertical * $width / 2;
}

// 呼び出し
echo calculateTriangleArea(10);
// PHP Fatal error:  Uncaught ArgumentCountError: Too few arguments to function calculateTriangleArea()