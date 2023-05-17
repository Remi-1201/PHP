<?php
 
class Dog
{
    public $name;
 
    public function __construct($name)
    {
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
 
    public function shake_tail()
    {
        echo 'tail shaking' . PHP_EOL;
    }
}
 
$pochi = new Dog('pochi');
echo $pochi->name . PHP_EOL; // pochi

// get_class_methods 関数 ============================
$pochi = new Dog('pochi');
print_r(get_class_methods($pochi));

// Array
// (
//     [0] => __construct
//     [1] => eat
//     [2] => move
//     [3] => bark
//     [4] => shake_tail
// )

// クラスメソッド ====================================
// クラスメソッドは、次のように、メソッド名の前に static を付加して設定
class Cafe
{
    public static function drink()
    {
        return 'drinking';
    }
}

// クラス名::クラスメソッド名 の形で実行
echo Cafe::drink() . PHP_EOL;
// drinking

// self はクラス自身を指します =======================
class Cafe
{
    public static function drink()
    {
        return 'drinking';
    }

    public function echoDrink()
    {
        // self::drink() は Cafe::drink() と同義であり、
        // self はクラス自身を指します
        echo self::drink() . PHP_EOL;
    }
}

$cafe = new Cafe(); 
// Cafeクラスをインスタンス化し、echoDrinkメソッドを実行をします。
$cafe->echoDrink();
// drinking

// ====================================================
class Dog
{
    public $name;

    public function __construct($name)
    {
        // $this はオブジェクト自身（インスタンス）を指します
        // $this->name はオブジェクト自身の $name プロパティを意味します
        // __construct メソッドの引数で受け取った $name を、
        // 生成したインスタンスの $name プロパティに代入
        $this->name = $name;
    }
    // 省略
}

// プライベートメソッド ================================
class Cafe
{
    public function drink($kind)
    {
        return $kind . 'は、' . $this->coffee($kind) . 'です。';
    }
 
    private function coffee($kind)
    {
        if ($kind === 'モカ') {
            return 'フルーツのような酸味と甘み';
        } else if ($kind === 'キリマンジャロ') {
            return '野性味あふれる味';
        } else if ($kind === 'ブルーマウンテン') {
            return 'コーヒーの王様';
        }
    }
}

$cafe = new Cafe();
echo $cafe->drink('モカ') . PHP_EOL;
// モカは、フルーツのような酸味と甘みです。
echo $cafe->drink('ブルーマウンテン') . PHP_EOL;
// ブルーマウンテンは、コーヒーの王様です。