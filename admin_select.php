<?php
include("function.php");
$pdo=dbConnect();

$sql="SELECT *FROM items_table";
$stmt = $pdo->prepare($sql);
$status=$stmt->execute();


$view ="";
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else{
while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
    $view .="<p>";
    $view .='<a href="admin_view.php?id='.$result["id"].'">';
    $view .=$result["itemid"].":".$result["itemname"]." ".$result["itemcost"]." ".$result["explanation"];
    $view .='</a>';    
    $view .=' ';    
    $view .='</a>';    
    $view .='<a href="admin_itemDelete.php?id='.$result["id"].'">';
    $view .='[削除]';    
    $view .='</a>';    
    $view .="</p>";
}
}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>おかいもの</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="header">注意※※管理者専用画面です</header>
ログイン画面に戻る
<p><a href="admin.php">商品追加はこちら</a></p>
<p>商品詳細の更新は以下のリンクよりお願い致します。</p>

<div><?=$view?></div>



<footer class="footer">◆OKAIMONO◆</footer>

</body>
</html>










