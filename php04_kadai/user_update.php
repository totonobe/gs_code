<?php
session_start();


//-------------------
//insert.phpからコピー
//-------------------
//1. POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$id = $_POST["id"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();
sessChk();
//３．データ登録SQL作成
$sql = "UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,date=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);       //Integer（数値の場合 PDO::PARAM_INT) stmtとbindvalueにはスペースを入れない
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);     //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);           //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: user_list_view.php");//location:とphpの間に半角すぺーすが必ず必要
    exit;
}


?>
