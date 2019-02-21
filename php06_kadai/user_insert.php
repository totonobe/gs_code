<?php
session_start();

//1. POSTデータ取得
include("funcs.php");
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$pw = password_hash($lpw, PASSWORD_DEFAULT); //ハッシュ化

//2. DB接続します
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name,lid,lpw,date)VALUES(:name,:lid,:pw,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pw', $pw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: user_register.php");
    exit;
}
