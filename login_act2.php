<?php
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

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
    $pdo = new PDO('mysql:dbname=shopping_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}
//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO user_table(id, username, userid, userpw, indate )VALUES
(NULL, :username, :userid, :userpw, :sysdate())");
$stmt->bindValue(':username', $username, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$res = $stmt->execute();


//４．データ登録処理後
if ($res==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: index.php");
    exit;
}


?>

<?php
session_start();
//エラー項目の確認
if($_POST["username"] == ""){
$error["username"] ="blank";
}
if($_POST["lid"] == ""){
$error["lid"] ="blank";
}
if($_POST["lpw"] <4){
$error["lpw"] ="length";
}
if($_POST["lpw"] == ""){
$error["lpw"] ="blank";

}
if(empty($error)){
  $_SESSION["join"]=$_POST;
  header("Location: insert1/check.php");
  exit;
}





?>
