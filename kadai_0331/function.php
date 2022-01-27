<?php

//ログイン認証チェック
function loginCheck(){
    if(!isset($_SESSION["chk_ssid"])||$_SESSION["chk_ssid"]!=session_id()){
  echo "LOGIN ERROR";
  exit();
}else{
  session_regenerate_id(true);
  $_SESSION["check_ssid"] =session_id();
}
}



//DB呼び出し
function dbConnect(){
try {
$pdo = new PDO('mysql:dbname=shop_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}
return $pdo;
    
}

?>