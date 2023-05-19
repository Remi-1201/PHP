<?php
// フラットな記述 =========================
$user_name = 'noro';
$user_email = 'noro@example.com';
echo "name: {$user_name}" . PHP_EOL;
echo "name: {$user_email}" . PHP_EOL;
$user_name = 'taro';
$user_email = 'taro@example.com';
echo "name: {$user_name}" . PHP_EOL;
echo "name: {$user_email}" . PHP_EOL;

$book_title = 'PHPBook';
$book_author = 'Rasmus Lerdorf';
echo "{$book_title} - {$book_author}" . PHP_EOL;
$book_title = 'LaravelBook';
$book_author = 'Taylor Otwell';
echo "{$book_title} - {$book_author}" . PHP_EOL;

/*  name: noro
    name: noro@example.com
    name: taro
    name: taro@example.com
    PHPBook - Rasmus Lerdorf
    LaravelBook - Taylor Otwell */

// オブジェクト指向 =================================
class User
{
    public $name;
    public $email;
 
    public function __construct($name, $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }
 
    public function nameWithLabel()
    {
        return "name: {$this->name}";
    }
 
    public function emailWithLabel()
    {
        return "email: {$this->email}";
    }
}
 
class Book
{
    public $title;
    public $author;
 
    public function __construct($title, $author)
    {
         $this->title  = $title;
         $this->author = $author;
    }
 
    public function titleAndAuthor()
    {
        return "{$this->title} - {$this->author}";
    }
}

$user = new User('noro', 'noro@example.com');
echo $user->nameWithLabel() . PHP_EOL;
echo $user->emailWithLabel() . PHP_EOL;

$user = new User('taro', 'taro@example.com');
echo $user->nameWithLabel() . PHP_EOL;
echo $user->emailWithLabel() . PHP_EOL;

$book = new Book('PHPBook', 'Rasmus Lerdorf');
echo $book->titleAndAuthor() . PHP_EOL;
$book = new Book('LaravelBook', 'Taylor Otwell');
echo $book->titleAndAuthor() . PHP_EOL;

/*  name: noro
    email: noro@example.com

    name: taro
    email: taro@example.com

    PHPBook - Rasmus Lerdorf
    LaravelBook - Taylor Otwell */

//「has-a」の関係 =====================================
// has-a は、「持っているの関係」ともいえます。
// has-a関係は、継承関係にはなりません。
class Coffee
{
 
}
 
class Cafe
{
    public $coffe;
 
    public function __construct()
    {
      // Coffee クラスを直接インスタンス化
      $this->coffee = new Coffee();
    }
}

// Cafe クラスと Coffee クラスは、has-a「持っている」の関係
// Coffee クラスは、Cafe クラスと継承関係にはなりません