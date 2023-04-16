<?php

function pointPost()
{
    $count = 1;
    while ($count <= 10) {
        $point = readline('1〜5の数字を入力してください。 ' . PHP_EOL);

        var_dump($point);
        // 変数 $point に "値" が入っているのが確認できます。
        // デバッグをするときは、var_dump 関数を使用する。        
        exit(); // 処理の終了

        sort($point); // $point を sort() に渡す

        if ($point < 1) {
            echo 'エラーです' . PHP_EOL;
        }
        elseif ($point > 5) {
            echo 'エラーです' . PHP_EOL;
        }
        else {
            echo 'ありがとうございます' . PHP_EOL;
        }
        $count = $count + 1;
    }
}

pointPost(); // 関数名は正しいものに修正しておいてください。