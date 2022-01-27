<?php
session_start();
include("function.php");
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];

$pdo=dbConnect();

$sql= "SELECT *FROM users_table WHERE userid=:lid AND userpw=:lpw" ;
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid); 
$stmt->bindValue(':lpw', $lpw); 
$res = $stmt->execute();


if($res==false){
$error = $stmt->errorInfo();
exit("QueryError:".$error[2]);
}

//抽出データ数取得(1レコードだけを抽出)
$val= $stmt->fetch();


if( $val["id"]  != ""){
    $_SESSION["chk_ssid"] =session_id();
    $_SESSION["username"] =$val["username"];
    header("Location: index.php");
}else{
    header("Location: login.php");
}
exit();

session_start();
//エラー項目の確認
if($_POST["username"] == ""){
$error["username"] ="blank";
}
if($_POST["lid"] == ""){
$error["lid"] ="blank";
}
if($_POST["lpw"] <4){
$error["lpw"] ="length";
}
if($_POST["lpw"] == ""){
$error["lpw"] ="blank";

}
if(empty($error)){
  $_SESSION["join"]=$_POST;
  header("Location: check.php");
  exit;
}





?>


