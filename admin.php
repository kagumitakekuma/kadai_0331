

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品登録画面</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="header">注意※※管理者専用画面です</header>


<p>4項目をすべて埋めて追加登録ボタンを押して下さい！</p>

<form method="POST" action="admin_itemInsert.php" class="">
<div class="itemInsert">
<p>商品コード</p>
<label for=""><input type="text" name="itemid"></label>
<p>商品名</p>
<label for=""><input type="text" name="itemname"></label>
<p>価格</p>
<label for=""><input type="text" name="itemcost"></label>
<p>説明</p>
<label for=""><input type="text" name="explanation"></label>
</div>

<div><input type="submit" value="追加登録"></div>

</form>



<footer class="footer">◆OKAIMONO◆</footer>

</body>
</html>



