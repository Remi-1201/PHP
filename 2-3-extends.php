<?php

class Animal
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function eat()
    {
        echo '食べる' . PHP_EOL;
    }

    public function move()
    {
        echo '自由に移動する' . PHP_EOL;
    }

    public function voice($arg1 = 'ウォー', $arg2 = '声を出す')
    {
        echo "{$this->name}が{$arg1}と{$arg2}" . PHP_EOL;
    }
}

class Dog extends Animal
{
    use Pet;

    public function voice($arg1 = 'わんわん', $arg2 = '吠える')
    {
        parent::voice(arg1: $arg1, arg2: $arg2);
    }

    public function shakeTail()
    {
        echo '尻尾を振る' . PHP_EOL;
    }
}

// trait = オブジェクトとしてのインスタンス化ができない
trait Pet
{
    public $owner;

    public function look($arg = null)
    {
        if ($this->owner === $arg) {
            echo '甘える' . PHP_EOL;
        } else {
            echo '警戒する' . PHP_EOL;
        }
    }
}

$pochi = new Dog('ポチ');
$pochi->owner = '山田太郎';

$pochi->look("山田太郎"); // 甘える
$pochi->look("田中花子"); // 警戒する
$pochi->look(); // 警戒する
$pochi->voice(); // ポチがわんわんと吠える