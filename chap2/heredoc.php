<?php
/**
 * Created by PhpStorm.
 * User: endu
 * Date: 2018/01/07
 * Time: 10:41
 */

$str = 'PHP';
$msg = <<<EOD
{$str}はサーバサイドで動作する簡単なスクリプト言語です。
遠藤が最初に触れた言語であります。
当時はなにもわからなかったですが、今は少しだけ理解できるようになりました。
ということは少しづつですが、ぺちぱーに近づけるみたいです。
EOD;

print $msg;
