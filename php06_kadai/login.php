<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">LOGIN</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>
<a href="logout.php">ログアウト</a>

<h2>SQLについてのメモ</h2>
<h3>DML（データ操作言語）</h3>
<p>
・SELECT データの取り出し<br>
・INSERT 新規データの挿入<br>
・UPDATE 既存データの更新<br>
・DELETE 既存データの削除<br>
・MERGE データをマージ
</p>
<h3>DDL（データ定義言語）</h3>
<p>
・CREATE オブジェクトの作成<br>
・ALTER オブジェクトの定義変更<br>
・DROP オブジェクトの削除<br>
・RENAME オブジェクト名の変更<br>
・TRUNCATE 表の切捨て<br>
・COMMIT コメントの定義<br>
</p>
<h3>DML（データ制御言語）</h3>
<p>
・GRANT 権限の付与<br>
・REVOKE 権限の取り消し<br>
</p>
<h3>トランザクション制御</h3>
<p>
・COMMIT 変更の確定<br>
・ROLLBACK 変更の取り消し<br>
・SAVEPOINT セーブポイントの作成<br>
</p>
</body>
</html>