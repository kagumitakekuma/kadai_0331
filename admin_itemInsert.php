<?php
include("function.php");
if(
    !isset ($_POST["itemid"]) || $_POST["itemid"] == "" ||
    !isset ($_POST["itemname"]) || $_POST["itemname"] == "" ||
    !isset ($_POST["itemcost"]) || $_POST["itemcost"] == "" ||
    !isset ($_POST["explanation"]) || $_POST["explanation"] == "" 
){
    exit("paramError");
}

$itemid = $_POST["itemid"];
$itemname = $_POST["itemname"];
$itemcost= $_POST["itemcost"];
$explanation = $_POST["explanation"];

// echo ("$itemid,$itemname,$itemcost,$explanation");


//DB接続
$pdo=dbConnect();

$stmt = $pdo->prepare("INSERT INTO items_table(id,itemid, itemname, itemcost, explanation,
indate )VALUES(NULL, :itemid, :itemname, :itemcost, :explanation, sysdate())");
$stmt->bindValue(':itemid', $itemid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':itemname', $itemname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':itemcost', $itemcost, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':explanation', $explanation, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// var_dump($stmt);

$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}
// } else {
//     //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
//     header("Location: cart.php");
//     exit;
// }




?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品登録</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header class="header">注意※※管理者専用画面です</header>
<p>〇登録完了しました</p>
<p><a href="admin_select.php">管理者ページトップへ戻る</a></p>
<p><a href="login.php">ログイン画面へ戻る</a></p>
</body>
</html>
