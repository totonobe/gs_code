<?php
$id = $_GET["id"];
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
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
  <title>詳細</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="guest_select.php">データ一覧（ゲスト用）へ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend></legend>
     <label>名前：<?=$row["name"]?></label><br>
     <label>Email：<?=$row["email"]?></label><br>
     <!-- <label>年齢：<input type="text" name="age" value="<?=$row["age"]?>"></label><br> -->
     <label>備考：<?=$row["naiyou"]?></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <!-- <input type="submit" value="送信"> -->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
