<?php
include("function.php");
//idを前のページからもってくる
$id=$_GET["id"];
// echo $id;
// exit;

$pdo=dbConnect();
$sql="SELECT *FROM items_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status=$stmt->execute();

$view ="";
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else{
$row = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header class="header">注意※※管理者専用画面です</header>
<form method="POST" action="admin_itemUpdate.php">
<fieldset>
<label>商品名：<input type="text" name="itemname" value="<?=$row["itemname"]?>"></label><br>
<label>単価（円）：<input type="text" name="itemcost" value="<?=$row["itemcost"]?>"></label><br>
<label>説明：<input type="text" name="explanation" value="<?=$row["explanation"]?>"></label><br>
<input type="hidden" name="id" value="<?=$row["id"]?>">
<input type="submit" value="更新" class="button1">
</fieldset>

</form>

</body>
</html>