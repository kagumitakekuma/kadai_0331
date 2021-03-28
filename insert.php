<?php
include("function.php");
if(
    !isset ($_POST["itemid"]) || $_POST["itemid"] == "" ||
    !isset ($_POST["itemname"]) || $_POST["itemname"] == "" ||
    !isset ($_POST["itemcost"]) || $_POST["itemcost"] == "" ||
    !isset ($_POST["quantity"]) || $_POST["quantity"] == ""
){
    exit("paramError");
}
// 1. POSTデータ取得
// まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）

$itemid = $_POST["itemid"];
$itemname = $_POST["itemname"];
$itemcost= $_POST["itemcost"];
$quantity = $_POST["quantity"];

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
$pdo=dbConnect();
//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO order_table(id,itemid, itemname, itemcost, quantity,
indate )VALUES(NULL, :itemid, :itemname, :itemcost, :quantity, sysdate())");
$stmt->bindValue(':itemid', $itemid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':itemname', $itemname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':itemcost', $itemcost, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
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
  <title>一発ギャグ購入処</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="header">◆OWARAIOWARAIOWARIOWARAI◆</header>

<h2>カートの中身</h2>
<table border="1" >
<tr class="item">
<th>商品コード</th>
<th>商品名</th>
<th>価格</th>
<th>数量</th>
<th class="order">注文しちゃう？</th>
</tr>
<form method="POST" action="cart.php" class="form">
<tr class="list">
<th><input type="hidden" name="itemid" value="<?=$itemid?>"> <?=$itemid?> </th>
<th><input type="hidden" name="itemname" value="<?=$itemname?>"> <?=$itemname?> </th>
<th><input type="hidden" name="itemcost" value="<?=$itemcost?>"> <?=$itemcost?> </th>
<th><input type="hidden" name="quantity"value="<?=$quantity?>"> <?=$quantity?></th>
<th><input type="submit" value="しちゃう"　class="order1"></th>
</tr>
</form>
<?php
$pdo=null;
?>
</table>

<p>注文しない方はこちらへ</p>
    <div><a class="navbar-brand" href="index.php">トップへ戻る</a></div>
    </div>
<footer class="footer">◆OWARAIOWARAIOWARIOWARAI◆</footer>

</body>
</html>
