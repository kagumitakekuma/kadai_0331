<?php
include("function.php");
$id          = $_POST["id"];
$itemname    = $_POST["itemname"];
$itemcost    = $_POST["itemcost"];
$explanation = $_POST["explanation"];

$pdo=dbConnect();

$sql = 'UPDATE items_table SET itemname=:itemname, itemcost=:itemcost, explanation=:explanation WHERE id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':itemname', $itemname,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':itemcost', $itemcost,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':explanation', $explanation, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id,                   PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
// var_dump($username,$lid,$lpw);
// 
//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else{
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: admin_select.php");
    exit;
}





?>