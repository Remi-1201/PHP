<?php

$name = 'tom';

function postSample() {
    echo $name . PHP_EOL; 
    // Undefined variable エラー
}

echo $name . PHP_EOL; 
// tom と表示される

postSample();
// Undefined variable エラー
// $name という変数を postSample 関数の外で定義しているので、
// 参照できないというエラーです。

//=====================================
//逆に、関数内で定義されたローカル変数を関数の外から参照することもできません。
<?php
 
function postSample(){
    $name = 'tom'; 
    // 関数内で変数を定義
  echo $name . PHP_EOL;
}
 
postSample(); 
// tom と表示される
echo $name . PHP_EOL;  
// Undefined variable エラー

//=====================================
// グローバル変数 = 常にプログラム上のどこからでも参照できるスコープを持つ