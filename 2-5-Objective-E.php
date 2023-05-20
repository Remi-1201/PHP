<?php
// アプリケーションの一つのファイルをクラス別に分けて管理する
// grocery_app/grocery.php =============================

// 商品クラスの設定
class Grocery
{
    public $name;
    public $price;
 
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

// grocery_app/user.php ================================
// ユーザクラスの設定
class User
{
    protected $name;
    protected $address;
 
    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }
}

// grocery_app/customer.php ================================
// 購入者クラスの設定
class Customer extends User
{
    use Shopping;

    private $basket;
    private $sum = 0;

    public function __construct($name, $address)
    {
        parent::__construct(name: $name, address: $address);
    }

    public function shopping($groceries)
    {
        // 買い物を開始する.
        $this->groceryList(groceries: $groceries);

        $shopping_end = null;
        while ($shopping_end !== 'yes') {
            // 商品選択
            echo '商品番号選択' . PHP_EOL;
            $number = readline();

            // 数入力
            echo '商品数量入力' . PHP_EOL;
            $quantity = intVal(readline());

            $this->entry(grocery: $groceries[$number], quantity: $quantity);

            echo '買い物終了するか？ yes/no' . PHP_EOL;
            $shopping_end = readline();
        }
        // shopping_listの中で$sumが計算される
        $this->shoppingList();

        return [
            'name' => $this->name,
            'sum'  => $this->sum,
            'date' => date('Y-m-d'),
        ];
    }

    private function entry($grocery, $quantity)
    {
        $this->basket[] = [
            'grocery'  => $grocery,
            'quantity' => $quantity,
        ];
    }
}

// grocery_app/seller.php ======================================
// 販売者クラス
class Seller extends User
{
    use Shopping;

    private $shop;
    private $orders;

    public function __construct($name, $shop, $address = null)
    {
        parent::__construct(name: $name, address: $address);
        $this->shop = $shop;
    }

    public function orders($order)
    {
        $this->orders[] = $order;
    }
}

// grocery_app/shopping.php ======================================
trait Shopping
{
    /**
     * 顧客別注文リスト
     * 購入者の購入内容に基づいて、購入者ごとの注文リストを表示する
     */
    public function orderingList()
    {
        $sum = 0;
        echo "=====　顧客別注文リスト({$this->name}, {$this->shop})　=====" . PHP_EOL;
        foreach ($this->orders as $order) {
            echo "顧客名: {$order['name']}, 金額: {$order['sum']}, 日時：{$order['date']}" . PHP_EOL;
            $sum += $order['sum'];
        }
        echo "--------------合計：{$sum}" . PHP_EOL;
        echo '====================================' . PHP_EOL;
    }

    /**
     * 商品リスト
     */
    private function groceryList($groceries)
    {
        echo '------食料品リスト------' . PHP_EOL;
        foreach ($groceries as $index => $grocery) {
            echo "{$index}: {$grocery->name}, {$grocery->price}" . PHP_EOL;
        }
    }

    /**
     * 買い物リスト
     */
    private function shoppingList()
    {
        echo "=====　買い物リスト({$this->name}/{$this->address})　=====" . PHP_EOL;
        foreach ($this->basket as $basket) {
            $money = $basket['grocery']->price * $basket['quantity'];
            echo "商品名: {$basket['grocery']->name}, 数量: {$basket['quantity']}, 金額： {$money}" . PHP_EOL;
            $this->sum += $money;
        }
        echo "----------合計：{$this->sum}-------------" . PHP_EOL;
        echo "====================================" . PHP_EOL;
    }
}

// grocery_app/execute_app.php ==================================
require('user.php');
require('grocery.php');
require('shopping.php');
require('customer.php');
require('seller.php');

// 商品リストの作成
// それぞれの商品をインスタンス化して、商品配列に保存する。
$groceries = [
    new Grocery(name: 'バナナ', price: 300),
    new Grocery(name: 'パン', price: 150),
    new Grocery(name: '牛乳', price: 230),
    new Grocery(name: '卵', price: 280),
    new Grocery(name: '肉', price: 800),
    new Grocery(name: '魚', price: 500),
];

// 販売者（高橋一郎、Aショップ）をインスタンス化
$ichiro = new Seller(name: '高橋一郎', shop: 'Aショップ');

// 山田太郎をインスタンス化
$taro = new Customer(name: '山田太郎', address: 'Tokyo');
// 鈴木花子をインスタンス化
$hanako = new Customer(name: '鈴木花子', address: 'Nagoya');
// 佐々木トミーをインスタンス化
$tommy = new Customer(name: '佐々木トミー', address: 'Osaka');

// 山田太郎の買い物＆お買い物リスト作成
$order = $taro->shopping(groceries: $groceries);
$ichiro->orders(order: $order);
// 鈴木花子の買い物＆お買い物リスト作成
$order = $hanako->shopping(groceries: $groceries);
$ichiro->orders(order: $order);
// 佐々木トミーの買い物＆お買い物リスト作成
$order = $tommy->shopping(groceries: $groceries);
$ichiro->orders(order: $order);

// 個客別注文リストの表示
$ichiro->orderingList();

/*
$ php execute_app.php
------食料品リスト------
0: バナナ, 300
1: パン, 150
2: 牛乳, 230
3: 卵, 280
4: 肉, 800
5: 魚, 500
商品番号選択
0
商品数量入力
2
買い物終了するか？ yes/no
yes
=====　買い物リスト(山田太郎/Tokyo)　=====
商品名: バナナ, 数量: 2, 金額：600
----------合計：600-------------
====================================
------食料品リスト------
0: バナナ, 300
1: パン, 150
2: 牛乳, 230
3: 卵, 280
4: 肉, 800
5: 魚, 500
商品番号選択
5
商品数量入力
3
買い物終了するか？ yes/no
yes
=====　買い物リスト(鈴木花子/Nagoya)　=====
商品名: 魚, 数量: 3, 金額：1500
----------合計：1500-------------
====================================
------食料品リスト------
0: バナナ, 300
1: パン, 150
2: 牛乳, 230
3: 卵, 280
4: 肉, 800
5: 魚, 500
商品番号選択
3
商品数量入力
4
買い物終了するか？ yes/no
no
商品番号選択
2
商品数量入力
2
買い物終了するか？ yes/no
yes
=====　買い物リスト(佐々木トミー/Osaka)　=====
商品名: 卵, 数量: 4, 金額：1120
商品名: 牛乳, 数量: 2, 金額：460
----------合計：1580-------------
====================================
=====　顧客別注文リスト(高橋一郎, Aショップ)　=====
顧客名: 山田太郎, 金額: 600, 日時：2020-07-13
顧客名: 鈴木花子, 金額: 1500, 日時：2020-07-13
顧客名: 佐々木トミー, 金額: 1580, 日時：2020-07-13
--------------合計：3680
====================================
*/