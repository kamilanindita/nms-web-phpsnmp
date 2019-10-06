<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php');
}
else {
   $username = $_SESSION['username'];
}

$token=$_POST['token'];
$chat_id=$_POST['chat_id'];

require_once("koneksi/koneksi.php");
$conftele="UPDATE conf_telegram SET token='$token',chat_id='$chat_id' WHERE id_='1'";
$db->query($conftele);

header('location:configure_notifications.php');

?>
