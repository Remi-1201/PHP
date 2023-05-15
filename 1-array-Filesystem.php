<?php
 
while (true) {
    $point = intval(readline('1から5の数字で評価を入力してください。終了する場合は「6」を入力してください' . PHP_EOL));
    if ($point === 6) {
        echo '終了します' . PHP_EOL;
        break;
    } elseif ($point !== 0) {
        $comment = readline('コメントを入力してください' . PHP_EOL);

        // ファイルに書き込むデータをセットする
        $post = "ポイント: ${point} コメント: ${comment}" . PHP_EOL;

        echo $post . PHP_EOL;

        // 1.data.txtを開く
        $file = fopen('data.txt', 'a');
        // 2. ファイルへ書き込む
        fwrite($file, $post);
        // 3. ファイルを閉じる
        fclose($file);
        
        // 1.data.txtを開く
        $fread_file = fopen('data.txt', 'r');
        // 2. ファイルを1行ずつ読み込む
        while (($line = fgets($fread_file )) !== false) {
            echo $line;
        }
        // 3. ファイルを閉じる
        fclose($fread_file);
    } else {
        echo '数字を入力してください' . PHP_EOL;
    }
}