<?php

1.“1から5で評価を入力してください。終了する場合は「6」を入力してください”と出力する
2.readline で入力された評価ポイント受け取る
3.数字以外を入力されたら”数字を入力してください”と出力して入力モードに、6が入力されたら”終了します”と出力してプログラムを終了する
4.readline で入力されたコメントを受け取る
5.過去の評価ポイントとコメントを”ポイント：○ コメント：○○○”と言う形で全件出力する（プログラムが終了した時点でデータは消えます）
6.1に戻る

// 全データを格納するための配列
$posts = [];

while (true) {
    // readline で入力された評価ポイント受け取る
    $point = intval(readline('1から5の数字で評価を入力してください。終了する場合は「6」を入力してください' . PHP_EOL));
    // 6が入力されたら
    if ($point === 6) {
        echo '終了します' . PHP_EOL;
        break;
    } elseif ($point !== 0) {
        // readline で入力されたコメントを受け取る
        $comment = readline('コメントを入力してください' . PHP_EOL);
        //入力された値が入った配列
        $post = [
            'point'  => $point,
            'comment'=> $comment,
        ];
        // posts に $post を追加
        // while でループが一つ進むたびに
        // $posts に要素が追加されていきます。
        array_push($posts, $post);
        foreach ($posts as $post) {
            $point = $post['point'];
            $comment = $post['comment'];
            // 過去の評価ポイントとコメントを全件出力
            echo "ポイント: $point コメント: $comment" . PHP_EOL;
        }
    } else {
        // 数字以外を入力されたら
        echo '数字を入力してください' . PHP_EOL;
    }
}