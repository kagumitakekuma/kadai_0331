<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$itemid = $_POST["itemid"];
$itemname = $_POST["itemname"];
$itemcost= $_POST["itemcost"];
$quantity = $_POST["quantity"];


try {
$pdo = new PDO('mysql:dbname=shopping_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM order_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
   $result = $stmt->fetch();
    $view .= "<p>カートの中身を表示</P>";
    $view .= $result["itemid"].":".$result["itemname"].",".$result["itemcost"].",".$result["quantity"];
    $view .= "</p>";
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>一発ギャグ購入処</title>
<link href="css/style.css" rel="stylesheet">

</head>
<body>
<header class="header">◆OKAIMONO◆
<a class="logout" href="logout.php">ログアウト</a>
</header>
<h2>カートの中身</h2>
<table border="1" >
<tr class="item">
<th>商品コード</th>
<th>商品名</th>
<th>価格</th>
<th>数量</th>
<th class="order2">本当にいいの？</th>
</tr>
<form method="POST" action="order.php" class="form">
<tr class="list">
<th> <?=$itemid?></th>
<th> <?=$itemname?></th>
<th> <?=$itemcost?></th>
<th> <?=$quantity?></th>

<th><input type="submit" value="いいよ！！！" class="order3"></th>
</tr>
</form>
<?php
$pdo=null;
?>
</table>

<p>やっぱりいらないという方はこちらへ</p>
    <div><a class="navbar-brand" href="index.php">トップへ戻る</a></div>
    </div>


</body>
</html>


<footer class="footer">OWARAIOWARAIOWARIOWARAI</footer>
</body>
</html> 