

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理者画面</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="header">注意※※管理者専用画面です</header>


<p>4項目をすべて埋めて追加登録ボタンを押して下さい！</p>

<form method="POST" action="admin_itemInsert.php" class="">
<div class="itemInsert">
<p>◆商品コード</p>
<label for=""><input type="text" name="itemid"></label>
<p>◆商品名</p>
<label for=""><input type="text" name="itemname" size="40" maxlength="20"></label>
<p>◆単価（円）</p>
<label for=""><input type="text" name="itemcost"></label>
<p>◆説明</p>
<textarea name="explanation" rows="4" cols="40"></textarea>

</div>

<div><input type="submit" value="追加登録" class="button1"></div>

</form>



<footer class="footer">◆OKAIMONO◆</footer>

</body>
</html>



