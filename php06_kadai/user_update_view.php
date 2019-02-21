<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
session_start();
$id = $_GET["id"];
echo "id".$id;

//----------------------------------
//以下、Select.phpをコピーしてきました。
//----------------------------------
include "funcs.php";
$pdo = db_con();
sessChk();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");//bindをする時は直接$を使ってはいけない。
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_list_view.php">登録ユーザーの一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー情報更新</legend>
     <label>名前：<input type="text" name="name" value="<?php echo $row["name"]; ?>"></label><br>
     <label>ID：<input type="text" name="lid" value="<?php echo $row["lid"]; ?>"></label><br>
     <label>パスワード：<input type="text" name="lpw" value="<?php echo $row["lpw"]; ?>"></label><br>
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
