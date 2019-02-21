<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include("funcs.php");
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1.  DB接続します
$pdo = db_con();

//2. データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid";
// $sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
// $stmt->bindValue(':lid', $lid);
// $stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  echo "SQL ok".'<br>';
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法
echo "fetch ok".'<br>';
// var_dump($val);
var_dump(password_verify($lpw, $val["lpw"]));

//5. 該当レコードがあればSESSIONに値を代入
if(password_verify($lpw, $val["lpw"]) ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: select.php");
}else{
  //logout処理を経由して全画面へ
  //header("Location: login.php");
}
exit();

// if(password_verify($lpw, $val["lpw"]) ){
//   $_SESSION["chk_ssid"]  = session_id();
//   $_SESSION["kanri_flg"] = $val['kanri_flg'];
//   $_SESSION["name"]      = $val['name'];

//   var_dump($lpw);
//   var_dump($val["lpw"]);

//   header("Location: select.php");
// }else{
//   password_verify($lpw, $val["lpw"]);
//   $_SESSION["chk_ssid"]  = session_id();
//   $_SESSION["kanri_flg"] = $val['kanri_flg'];
//   $_SESSION["name"]      = $val['name'];

//   $de_pass = strcmp($lpw, $val["lpw"]);
//   echo 'パスワード lpw' . $de_pass . '<br>';
//   echo 'ssid' . $_SESSION["chk_ssid"] . '<br>';
//   $de_kanri = strcmp($_SESSION["kanri_flg"], $val['kanri_flg']);
//   echo '管理フラグ' . $de_kanri . '<br>';
//   $de_name = strcmp($_SESSION["name"], $val['name']);
//   echo '名前' . $de_name . '<br>';

//   // var_dump($lpw);
//   // var_dump($val["lpw"]);
//   // var_dump($_SESSION["chk_ssid"]); var_dump(session_id());
//   // var_dump($_SESSION["chk_ssid"]);
//   $view = "";
//   $view .= '<a class="navbar-brand" href="logout.php">ログアウト</a>';



//   //logout処理を経由して全画面へ

//   // header("Location: login.php");
// }



?>
