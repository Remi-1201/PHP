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

// rsort関数 ========================
$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);

print_r($numbers);
// Array
// (
//     [0] => 22
//     [1] => 11
//     [2] => 6
//     [3] => 4
//     [4] => 2
// )

// ksort関数 ========================
$age = array(
  'Peter' => '35',
  'Ben'   => '37',
  'Joe'   =>'43',
);
ksort($age);

print_r($age);
// Array
// (
//     [Ben]   => 37
//     [Joe]   => 43
//     [Peter] => 35
// )

// array_map関数 ========================
array_map('関数', 配列);
function myfunction($n)
{
    return($n * 2);
}
$array = array(1, 2, 3, 4, 5);
$mapped = array_map('myfunction', $array);

print_r($mapped);
// Array
// (
//     [0] => 2
//     [1] => 4
//     [2] => 6
//     [3] => 8
//     [4] => 10
// )

// 配列の操作と戻り値 ========================
$numbers = array(4, 6, 2, 22, 11);

// 元の配列を変更する関数 ========================
sort($numbers);
print_r($numbers);
// Array
// (
//     [2] => 2
//     [0] => 4
//     [1] => 6
//     [4] => 11
//     [3] => 22
// )

// 元の配列を変更しない関数 ========================
function myfunction($n)
{
    return($n * $n);
}

$array = array(1, 2, 3, 4, 5);
$mapped = array_map('myfunction', $array);

print_r($array);
print_r($mapped);
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
//     [3] => 4
//     [4] => 5
// )
// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => 9
//     [3] => 16
//     [4] => 25
// )
