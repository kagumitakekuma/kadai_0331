<link rel="stylesheet" href="css/style.css?v=2" />


<?php
session_start();
include("function.php");
loginCheck();

// $username=$SESSION["name"];
// $msg="ようこそ".htmlspecialchars($username,\ENT_QUOTES,"UTF-8")."さん";

//finction.phpで関数化してあるもの
$pdo=dbConnect();

$sql="SELECT *FROM items_table";
$stmt = $pdo->prepare($sql);
$status=$stmt->execute();
$row = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>◆OKAIMONO◆</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

</header>
<h1>よろづや</h1>
<div>
<h3>世の中あまたいるお笑い芸人が愛用しているものだったり、なかったり。。。</h3>
<h3>ここへ迷いこんできたお客様、、、どうぞ見て行ってください。</h3>
<h3>いろんなもの、そろえてますよ。</h3>
</div>

<table border="1" >
<tr class="item">
<th>商品コード</th>
<th>商品名</th>
<th>単価（円）</th>
<th>説明</th>
<th>数量</th>
<th>カートに入れる</th>
</tr>

<?php
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<form method="POST" action="insert.php" class="form">
<tr class="list">
<th><input type="hidden" name="itemid" value="<?=$row["itemid"]?>"> <?=$row["itemid"]?> </th>
<th><input type="hidden" name="itemname" value="<?=$row["itemname"]?>"> <?=$row["itemname"]?> </th>
<th><input type="hidden" name="itemcost" value="<?=number_format($row["itemcost"])?>"> <?=number_format($row["itemcost"])?> </th>
<th><input type="hidden" name="explanation" value="<?=$row["explanation"]?>"> <?=$row["explanation"]?> </th>
<th><select name="quantity">
<option value=0>0</option>
<option value=1>1</option>
</th>

<th><input type="submit" value="追加" class="button"></th>
</tr>
</form>
<?php
}
$pdo=null;
?>
</table>

<footer class="footer">OWARAIOWARAIOWARAI</footer>



  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 

</body>
</html>
