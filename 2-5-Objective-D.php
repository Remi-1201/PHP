<?php
/*

1-販売者が、複数の商品を商品リストとして用意している。
2-顧客が、購入したい商品を商品リストから選択し、買い物かごに入れる。
3-顧客が買い物を終了すると、購入商品が確定し、商品の購入数量と単価から金額が計算され、買い物リストに反映される。同時に販売者に対し、購入者の名前、購入金額合計、購入日付が通知される。
4-販売者は、購入者ごとの購入内容を一覧で確認できる。

*/

// I- オブジェクト指向を使用しない
// 商品リスト作成
$groceries = [];    // 商品リストの入れ物を配列として用意する。
// 商品名、単価を配列として登録する。
$groceries = array(
    [ 'name'=> "バナナ", 'price'=> 300],
    ['name'=> "パン", 'price'=> 150],
    ['name'=> "牛乳", 'price'=> 230],
    ['name'=> "卵", 'price'=> 280],
    ['name'=> "肉", 'price'=> 800],
    ['name'=> "魚", 'price'=> 500],
);
 
// 購入者（山田太郎）を設定する。
$taro_name = "山田太郎";
$taro_address = "Tokyo";
 
// 商品リストを表示する。（PHPのオブジェクト用メソッドをあえて使用していない）
echo '------食料品リスト------' . PHP_EOL;
$i = 0;
while (isset($groceries[$i+1]) !== false) {
    echo "{$i}: {$groceries[$i]['name']}, {$groceries[$i]['price']}" . PHP_EOL;
    $i += 1;
}
 
// 山田太郎がショッピングを開始する。
$taro_basket = [];   // 空の買い物かごを用意する
$shopping_end = null;
while ($shopping_end != 'yes') {
    // 商品選択
    echo '商品番号選択' . PHP_EOL;
    $number = readline();  // 商品番号を入力する
    // 数入力
    echo '商品数量入力' . PHP_EOL;
    $quantity = readline();  // 商品数量を入力する
    // 山田太郎の買い物かごに選択した内容を追加する。
    $taro_basket[] = [$groceries[$number], $quantity];
    echo '買い物終了するか？ yes/no' . PHP_EOL;
    $shopping_end = readline();
}
// 山田太郎がショッピングを終了する。
 
// 山田太郎の買い物かごからお買い物リスト作成する。
$sum = 0;
$i = 0;
echo "=====　買い物リスト({$taro_name}/{$taro_address})　=====" . PHP_EOL;
// 山田太郎の買い物かごから買い物リストを作成する。
while (isset($taro_basket[$i]) !== false) {
    $grocery = $taro_basket[$i][0];
    $quantum = $taro_basket[$i][1];
    $money = $grocery['price'] * $quantum;
    echo "商品名: {$grocery['name']}, 数量: {$quantum}, 金額：{$money}" . PHP_EOL;
    $sum += $money;
    $i += 1;
}
echo "----------合計：{$sum}-------------" . PHP_EOL;
echo "====================================" . PHP_EOL;

/*
------食料品リスト------
0: バナナ, 300
1: パン, 150
2: 牛乳, 230
3: 卵, 280
4: 肉, 800
5: 魚, 500
商品番号選択
1
商品数量入力
5
買い物終了するか？ yes/no
no
商品番号選択
2
商品数量入力
2
買い物終了するか？ yes/no
yes
=====　買い物リスト(山田太郎/Tokyo)　=====
商品名: パン, 数量: 5, 金額：750
商品名: 牛乳, 数量: 2, 金額：460
----------合計：1210-------------
====================================
*/

// オブジェクト指向=======================================
// 商品クラスの設定 -----------------
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
 
// 販売者クラスの設定
class Seller extends User
{
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

    // 購入者の購入内容に基づいて、購入者ごとの注文リストを表示する
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
}
 
// 購入者クラスの設定
class Customer extends User
{
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
        // shopping_list の中で $this->sum が計算される
        $this->shoppingList();
        return [
            'name' => $this->name,
            'sum'  => $this->sum,
            'date' => date('Y-m-d'),
        ];
    }
 
    private function groceryList($groceries)
    {
        echo '------食料品リスト------' . PHP_EOL;
        foreach ($groceries as $index => $grocery) {
            echo "{$index}: {$grocery->name}, {$grocery->price}" . PHP_EOL;
        }
    }
 
    private function entry(Grocery $grocery, $quantity)
    {
        $this->basket[] = [
            'grocery'  => $grocery,
            'quantity' => $quantity,
        ];
    }
 
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
 
// 山田太郎の買い物＆お買い物リスト作成
$order = $taro->shopping(groceries: $groceries);
$ichiro->orders(order: $order);
$ichiro->orderingList();

/*
------食料品リスト------
0: バナナ, 300
1: パン, 150
2: 牛乳, 230
3: 卵, 280
4: 肉, 800
5: 魚, 500
商品番号選択
1
商品数量入力
5
買い物終了するか？ yes/no
no
商品番号選択
2
商品数量入力
2
買い物終了するか？ yes/no
yes
=====　買い物リスト(山田太郎/Tokyo)　=====
商品名: パン, 数量: 5, 金額：750
商品名: 牛乳, 数量: 2, 金額：460
----------合計：1210-------------
====================================
=====　顧客別注文リスト(高橋一郎, Aショップ)　=====
顧客名: 山田太郎, 金額: 1210, 日時：2020-07-13
--------------合計：1210
====================================
*/