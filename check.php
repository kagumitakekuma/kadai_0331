<?php
include("function.php");
if(
    !isset ($_POST["username"]) || $_POST["username"] == "" ||
    !isset ($_POST["lid"]) || $_POST["lid"] == "" ||
    !isset ($_POST["lpw"]) || $_POST["lpw"] == "" 
){
    exit("paramError");
}
// 1. POSTデータ取得
// まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$username = $_POST["username"];
$lid= $_POST["lid"];
$lpw= $_POST["lpw"];

// echo ("POSTの中身");
// var_dump($username,$lid,$lpw);
// echo ("<br>");

$pdo=dbConnect();
//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO users_table(id, username, userid, userpw, indate )VALUES
(NULL, :username, :userid, :userpw, sysdate())");
$stmt->bindValue(':username', $username, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// var_dump($stmt);
$res = $stmt->execute();
// var_dump($username,$lid,$lpw);
// 
//４．データ登録処理後
if ($res==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else
//  {
//     //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
//     header("Location: index.php");
//     exit;
// }

session_start();
//エラー項目の確認（バリデーション）
if($_POST["username"] == ""){
$error["username"] ="blank";
}
if($_POST["lid"] == ""){
$error["lid"] ="blank";
}
if($_POST["lpw"] <4){
$error["lpw"] ="length";
}
if(empty($error)){
  $_SESSION["join"]=$_POST;
  header("Location: check.php");
  exit;
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

<form method="POST" action="complete.php" class="form">
<dl>
<dt>・ご氏名</dt>
<dt><?=$username?></dt>
<dt>・ユーザーID</dt>
<dt><?=$lid?></dt>
<dt>・パスワード</dt>
<dt>【表示されません】</dt>
<dt><input type="submit" value="これでOK" class="button"></dt>

</form>
</table>

    <div><a class="" href="regist.php">やりなおし</a></div>
    </div>
<footer class="footer">◆おかいもの◆</footer>

</body>
</html>
