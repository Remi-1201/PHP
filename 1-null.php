<?php
 
function search(){
    // データを検索する処理
    // 検索結果がなかった時は null が返る
}
 
if (search()) {
    // なにかしら検索結果があった時の処理
    echo 'データがありました' . PHP_EOL;
} else {
    // 検索結果がなかった時の処理
    echo 'データがありませんでした' . PHP_EOL;
}

// ===============================================

$foo = null;
$bar = 0;
$buz = '';

var_dump (is_null($foo));
// bool(true)
var_dump (is_null($bar));
// bool(false)
var_dump (is_null($buz));
// bool(false)

// ===============================================

while (true) {
    $point = intval(readline('1から5の数字で評価を入力してください。終了する場合は「6」を入力してください' . PHP_EOL));

    if ($point === 6) {
        echo '終了します' . PHP_EOL;
        break;
    } elseif ($point !== 0) {
        $comment = readline('コメントを入力してください' . PHP_EOL);
        echo "あなたのポイント: $point" . PHP_EOL;
        echo "あなたのコメント: $comment" . PHP_EOL;
    } else {
        echo '数字を入力してください' . PHP_EOL;
    }
}