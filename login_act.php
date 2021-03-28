<?php
session_start();
include("function.php");
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];

$pdo=dbConnect();

$sql= "SELECT *FROM user_table WHERE userid=:lid AND userpw=:lpw" ;
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

?>