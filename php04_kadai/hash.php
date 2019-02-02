<?php
$user = "guest" . '<br>';
$view = "";

$pw = password_hash($user, PASSWORD_DEFAULT);
echo $user;
$view .= '<br>';
echo $pw;
?>
