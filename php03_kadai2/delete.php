<?php
$id = $_GET["id"];
echo $id;

include "funcs.php";
$pdo = db_con();

$sql = "DELETE FROM gs_user_table WHERE id=:id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: user_list_view.php");
    echo "削除しました";
    exit;
}
?>