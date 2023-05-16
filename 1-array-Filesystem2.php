<?php
　
while (true) {
  echo '実施したい処理を選択してください' . PHP_EOL;
  echo '1:評価ポイントとコメントを入力する' . PHP_EOL;
  echo '2:今までの結果を確認する' . PHP_EOL;
  echo '3:終了する' . PHP_EOL;
  $num = intval(readline());
　
  switch ($num) {
      case 1:
          $point = intval(readline('1から5で評価を入力してください' . PHP_EOL));
          while (true) {
              if ($point <= 0 \|\| $point > 5) {
                  $point = intval(readline('1から5で入力してください' . PHP_EOL));
              } else {
                  $comment = readline('コメントを入力してください' . PHP_EOL);
                  $post = "ポイント: ${point} コメント: ${comment}" . PHP_EOL;
                  echo $post . PHP_EOL;
                  $file = fopen('data.txt', 'a');
                  fwrite($file, $post);
                  fclose($file);
                  break;
              }
          }
          break;
      case 2:
          echo 'これまでの結果' . PHP_EOL;
          $fread_file = fopen('data.txt', 'r');
          while (($line = fgets($fread_file )) !== false) {
              echo $line;
          }
          fclose($fread_file);
          break;
      case 3:
          echo '終了します' . PHP_EOL;
          break 2;
      default:
          echo '1から3で入力してください' . PHP_EOL;
  }
}