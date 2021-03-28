<?php
include("function.php");
$id=$_GET["id"];
$pdo=dbConnect();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品登録画面</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="header">注意※※管理者専用画面です</header>

<table border="1" >
<tr class="item">
<th>商品コード</th>
<th>商品名</th>
<th>価格</th>
<th>説明</th>
</tr> 

<form method="POST" action="insert.php" class="form">
<tr class="list">
<th><input type="hidden" name="itemid" value="<?=$row["itemid"]?>"> <?=$row["itemid"]?> </th>
<th><input type="hidden" name="itemname" value="<?=$row["itemname"]?>"> <?=$row["itemname"]?> </th>
<th><input type="hidden" name="itemcost" value="<?=$row["itemcost"]?>"> <?=$row["itemcost"]?> </th>
<th><input type="hidden" name="explanation" value="<?=$row["explanation"]?>"> <?=$row["explanation"]?> </th>
<th><select name="quantity">
<option value=0>0</option>
<option value=1>1</option>
</th>

<th><input type="submit" value="追加"></th>
</tr>
</form>

</table>

<footer class="footer">◆OKAIMONO◆</footer>

</body>
</html> -->
