<?php

$array = [1, 4, 'ABC', 5];
echo $array[2] . PHP_EOL;

$array = ['name' => 'tanaka',  'age' => 30, 'address' => 'Tokyo'];

$array = [
  'name'    => 'tanaka',
  'age'     => 30,
  'address' => 'Tokyo' 
];

echo $array['name'] . PHP_EOL;

// =====================================
$array = [1, 2, 3];

print_r($array);
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )

// =====================================
$array = [
  'name'    => 'tanaka',
  'age'     => 30,
  'address' => 'Tokyo',
];

print_r($array);
// Array
// (
//     [name] => tanaka
//     [age] => 30
//     [address] => Tokyo
// )

// =====================================
$array = [1, 4, "ABC", 5];

$array[] = 'DEF'; 

print_r($array); 

// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => ABC
//     [3] => 5
//     [4] => DEF
// )

// =====================================
$array = [
  'name'    => 'tanaka',
  'age'     => 30,
  'address' => 'Tokyo',
];

$array['role'] = 'ceo'; 
// キーが'role'の要素'ceo'を追加

print_r($array);

// Array
// (
//     [name] => tanaka
//     [age] => 30
//     [address] => Tokyo
//     [role] => ceo
// )

// =====================================
array_splice($配列, $開始位置, $長さ);

$array = [1, 4, "ABC", 5];
array_splice($array, 1, 1); 
// インデックス[1]から1個の要素4を削除
print_r($array);

// Array
// (
//     [0] => 1
//     [1] => ABC
//     [2] => 5
// )

// =====================================
unset($配列[キー]);

$array = [
  'name'    => 'tanaka',
  'age'     => 30,
  'address' => 'Tokyo',
];

unset($array['address']); 
// キーが'address'の要素'Tokyo'を削除

print_r($array);
// Array
// (
//     [name] => tanaka
//     [age] => 30
// )

// =====================================
$array = [1, 4, "ABC", 5];

unset($array[1]); 
// インデックス[1]の要素4を削除

print_r($array);
// Array
// (
//     [0] => 1
//     [2] => ABC # インデックス[1]が歯抜けとなっている
//     [3] => 5
// )

// =====================================
$配列[index、またはキー] = '置換する要素'

$array = [1, 4, "ABC", 5];

$array[1] = 10; 
// インデックス[1]の要素4を10に置換

print_r($array);

// Array
// (
//     [0] => 1
//     [1] => 10
//     [2] => ABC
//     [3] => 5
// )

// =====================================
$array = [
  'name'    => 'tanaka',
  'age'     => 30,
  'address' => 'Tokyo',
];

$array['address'] = 'Osaka'; 
// キーが'address'の要素'Tokyo'を'Osaka'に置換

print_r($array);
// Array
// (
//     [name] => tanaka
//     [age] => 30
//     [address] => Osaka
// )

// =====================================
array_splice($配列, $開始位置, $長さ, $置換する要素);

$array = [
  'name'    => 'tanaka',
  'age'     => 30,
  'address' => 'Tokyo',
];

array_splice($array, 2, 1, 'Osaka'); 
// インデックス[2]の要素'Tokyo'を'Osaka'に置換

print_r($array);
// Array
// (
//     [name] => tanaka
//     [age] => 30
//     [0] => Osaka
// )

// =====================================
$array = [1, 4, 'ABC', 5];

array_push($array, 'DEF', 8); 
// 配列の末尾に'DEF'と8を追加

print_r($array);
// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => ABC
//     [3] => 5
//     [4] => DEF
//     [5] => 8
// )

// =====================================
$array = [1, 4, 'ABC', 5];

array_pop($array); 
// 配列の末尾の要素5を削除

print_r($array);
// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => ABC
// )

// =====================================
$array = [1, 4, 'ABC', 5];

array_shift($array); 
// 配列の先頭の要素1を削除

print_r($array);
// Array
// (
//     [0] => 4
//     [1] => ABC
//     [2] => 5
// )

// =====================================
$array = [1, 4, 'ABC', 5];

array_unshift($array, 'abc'); 
// 配列の先頭に要素'abc'を追加

print_r($array);
// Array
// (
//     [0] => abc
//     [1] => 1
//     [2] => 4
//     [3] => ABC
//     [4] => 5
// )

// =====================================
$array = [1, 4, 'ABC', 5];

print_r(array_slice($array, 1, 2));
// Array
// (
//     [0] => 4
//     [1] => ABC
// )

// =====================================
$array = [1, 4, 'ABC', 5];

echo count($array) . PHP_EOL;
// 4

// =====================================
$array = [1, 4];
$num   = 5;
$str   = 'ABC';
$sample   = [10, 'DEF'];
$test   = [
    'name'    => 'tanaka',
    'age'     => 30,
    'address' => 'Tokyo'
];

array_push($array, $num, $str, $sample, $test);

print_r($array);
// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => 5
//     [3] => ABC
//     [4] => Array
//         (
//             [0] => 10
//             [1] => DEF
//         )
//     [5] => Array
//         (
//             [name] => tanaka
//             [age] => 30
//             [address] => Tokyo
//         )
// )