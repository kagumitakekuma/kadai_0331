<?php
include("function.php");
if(
    !isset ($_POST["ordername"]) || $_POST["ordername"] == "" ||
    !isset ($_POST["postalcode"]) || $_POST["postalcode"] == "" ||
    !isset ($_POST["orderaddress"]) || $_POST["orderaddress"] == "" ||
    !isset ($_POST["tel"]) || $_POST["tel"] == "" 
    ){
    exit("paramError");
}
$ordername = $_POST["ordername"];
$postalcode= $_POST["postalcode"];
$orderaddress= $_POST["orderaddress"];
$tel = $_POST["tel"];


$pdo=dbConnect();

$stmt = $pdo->prepare("INSERT INTO address_table(id,ordername, postalcode, orderaddress, tel,
indate )VALUES(NULL, :ordername, :postalcode, :orderaddress, :tel, sysdate())");
$stmt->bindValue(':ordername', $ordername, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':postalcode', $postalcode, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':orderaddress', $orderaddress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tel', $tel, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
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
<meta charset="utf-8">
<title>◆OKAIMONO◆</title>
<link href="css/style.css" rel="stylesheet">

</head>
<body>
<header class="header">◆OKAIMONO◆
<a class="logout" href="logout.php">ログアウト</a>
</header>
<h2>配送先</h2>

<table border="1" >
<tr class="item">
<th>ご氏名</th>
<th>郵便番号</th>
<th>住所</th>
<th>電話番号</th>
<th class="order2">配送先問題ないですか？</th>
</tr>
<form method="POST" action="order3.php" class="form">
<tr class="list">
<th> <?=$ordername?></th>
<th> <?=$postalcode?></th>
<th> <?=$orderaddress?></th>
<th> <?=$tel?></th>
<th><input type="submit" value="OK！！" class="button1"></th>
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
<footer class="footer">OWARAIOWARAIOWARAI</footer>
</body>
</html> 