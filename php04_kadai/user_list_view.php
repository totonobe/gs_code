<?php
session_start();
include "funcs.php";
$pdo = db_con();
sessChk();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY date DESC");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $view .= '<table border="1">';
    $view .= '<tr>';
    $view .= '<td align="center" bgcolor="#DD4814"><font color="#FFFFFF">ユーザー名</font></td>';
    $view .= '<td align="center" bgcolor="#DD4814" width="60"><font color="#FFFFFF">ID</font></td>';
    $view .= '<td align="center" bgcolor="#DD4814" width="150"><font color="#FFFFFF">更新日時</font></td>';
    $view .= '<td align="center" bgcolor="#DD4814" width="100"><font color="#FFFFFF">管理flg</font></td>';
    $view .= '<td align="center" bgcolor="#DD4814" width="60"><font color="#FFFFFF">削除</font></td>';
    $view .= '</tr>';
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        // $view .= '<a href="user_update_view.php?id='.$result["id"].'">';
        $view .= '<tr><td><a href="user_update_view.php?id='.$result["id"].'">'.$result["name"] . '</a></td>'. '<td>' . $result["lid"] .'</td>'. '<td>' . $result["date"] .'</td>'. '<td>' . $result["kanri_flg"].'</td>'. '<td>' . '<a href="delete.php?id='.$result["id"].'">' . "[ 削除 ]" .'</a></td></tr>';
        $view .= '</a>';
        $view .= ' ';
        // $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= '</p>';
    }
    $view .= '</table>';

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザーの一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="user_register.php">ユーザー新規登録はこちら</a>
      <a class="navbar-brand" href="select.php">データ一覧</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
        <!-- <table border="1">
        <tr>
        <th bgcolor="#DD4814"><font color="#FFFFFF">メニュー</font></th>
        <th bgcolor="#DD4814" width="150"><font color="#FFFFFF">説明</font></th>
        <th bgcolor="#DD4814" width="200"><font color="#FFFFFF">豆知識</font></th>
        </tr> -->
        <?=$view?>
        <!-- </table> -->
        </div>
</div>
<!-- Main[End] -->

</body>
</html>
