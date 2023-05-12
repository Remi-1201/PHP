<?php

$name = 'PHP';   // 変数 $name を定義
echo $name . 'さん、こんにちは' . PHP_EOL; // 変数 $name が参照される
// PHPさん、こんにちは

$name = 'PHP';
echo "私の名前は $name です" . PHP_EOL;
// 私の名前は PHP です

$name = 'PHP';
echo "私の名前は${name}です" . PHP_EOL;
// 私の名前はPHPです

// 定数を定義する ====================================

// constを使用する場合
const TAX = 1.1;
// defineを使用する場合
define('TAX', 1.1);

// 定義済みの定数への再代入は一度だけ可能です。
// ただし、再代入を前提とした使い方はするべきではないため、
// 再代入すると警告メッセージが表示されます。
const SITE_NAME = 'dive';
const SITE_NAME = 'dive into';
echo SITE_NAME . PHP_EOL;