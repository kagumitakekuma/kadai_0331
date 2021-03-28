<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>おかいもの</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header class="header">okaimono</header>


<form method="post" action="login_act.php">
  <div class="box">
   <fieldset>
     <p>ユーザーIDとパスワードを入力してログインしてください。</p>
    <legend>ログイン</legend>
     <label>ユーザーID：<input type="text" name="lid"></label><br>
     <label>パスワード：<input type="text" name="lpw"></label><br>
     <input type="submit" value="ログイン"　class="login">
    </fieldset>
  </div>
</form>


<form method="post" action="regist.php">
  <div class="box">
   <fieldset>
         <p>会員登録がまだの方はこちらへ</p>

     <input type="submit" value="会員登録へ" class="touroku">
    </fieldset>
  </div>
</form>



<footer class="footer">OKAIMONO</footer>

 <!-- jQueryを読み込む！必ず先に！
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- slicknojsはiQueryの次に読み込む
    <script src="js/slick.js"></script> -->
    <!-- jsを読み込む -->
    <!-- <script src="js/app.js"></script>  -->
</body>
</html>

