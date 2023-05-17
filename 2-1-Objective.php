<?php

class Dog
{
    public function eat()
    {
        echo 'eating' . PHP_EOL;
    }

    public function move()
    {
        echo 'moving' . PHP_EOL;
    }

    public function bark()
    {
        echo 'barking' . PHP_EOL;
    }

    public function shakeTail()
    {
        echo 'tail shaking' . PHP_EOL;
    }
}

// インスタンス化 ===============================
$pochi = new Dog();

$hachi = new Dog();

// インスタンスにメソッドを実行させる =============
$pochi->shakeTail();
// tail shaking

$hachi->bark();
// barking

// オブジェクトにデータを持たせる ================
// オブジェクトにデータを持たせるには アクセス修飾子 $変数名 で定義します。
// このオブジェクト固有のデータのことをプロパティと言います。
class Dog
{
    public $name;

    // 省略
}

// インスタンスからプロパティを参照する
// インスタンス->プロパティ
$pochi->name

// __constructメソッド ========================
class Dog
{
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat()
    {
        echo 'eating' . PHP_EOL;
    }

    public function move()
    {
        echo 'moving' . PHP_EOL;
    }

    public function bark()
    {
        echo 'barking' . PHP_EOL;
    }

    public function shakeTail()
    {
        echo 'tail shaking' . PHP_EOL;
    }
}

$pochi = new Dog('pochi');
$hachi = new Dog('hachi');

echo $pochi->name . PHP_EOL;
echo $hachi->name . PHP_EOL;

// プロパティに定数を持たせる ============================
// 定数は、クラス内に共通で参照する固定値を持たせるために使用

class Title
{
    public const TITLE_WORD = 'PHP Laravel';

    public function main()
    {
        echo 'Book title is ' . self::TITLE_WORD . PHP_EOL;
    }
}

$title = new Title();
$title->main();
// Book title is PHP Laravel

// クラス名::定数名で参照 ===============================
class Title
{
    public const TITLE_WORD = 'PHP Laravel';

    public function main()
    {
        echo 'Book title is ' . self::TITLE_WORD . PHP_EOL;
    }
}

class Theme
{
    function title()
    {
        echo 'My book title is ' . Title::TITLE_WORD . PHP_EOL;
    }
}

$theme = new Theme();
$theme->title();
// My book title is PHP Laravel
echo Title::TITLE_WORD . PHP_EOL;
// PHP Laravel