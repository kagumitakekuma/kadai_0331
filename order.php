<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>◆OKAIMONO◆</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="header">◆OKAIMONO◆
<a class="logout" href="logout.php">ログアウト</a>
</header>
<h1>ジンクス取引所</h1>
   <a href="index.php">トップへ戻る</a>
   <a href="login.php">ログイン画面へ戻る</a>
<h2>では、配送先を以下よりご入力ください。</h2>


<form method="POST" action="order2.php">
<p>・ご氏名</P>
<input type="text" name="ordername" size="40" maxlength="20">
<p>・郵便番号</P>
<input type="text" name="postalcode" pattern="\d{3}-?\d{4}">
<p>・ご住所</P>
<input type="text" name="orderaddress" size="100" maxlength="100"　pattern="(?=.*?[\u30A1-\u30FC])[\u30A1-\u30FC\s]*"　>
<p>・電話番号</P>
<input type="text" name="tel" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}">

<div><input type="submit" value="確定" class="button1"></div>

<!-- 
<h2>納品まで今しばらくお待ちください。。。</h2> -->

<footer class="footer">OWARAIOWARAIOWARAI</footer>
</body>
</html>
