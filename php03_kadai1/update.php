<?php
//1.POSTでParamを取得


//2.DB接続など


//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。




//-------------------
//insert.phpからコピー
//-------------------
//1. POSTデータ取得
$bookname = $_POST["bookname"];
$url = $_POST["url"];
$comment = $_POST["comment"];
$id = $_POST["id"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET bookname=:bookname,url=:url,comment=:comment,date=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);       //Integer（数値の場合 PDO::PARAM_INT) stmtとbindvalueにはスペースを入れない
$stmt->bindValue(':url', $url, PDO::PARAM_STR);     //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);           //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: select.php");//location:とphpの間に半角すぺーすが必ず必要
    exit;
}


?>
