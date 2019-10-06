<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php');
}
else {
   $username = $_SESSION['username'];
}

$src_email=$_POST['src_email'];
$dst_email=$_POST['dst_email'];
$subject=$_POST['subject'];

require_once("koneksi/koneksi.php");
$confemail="UPDATE conf_email SET src_email='$src_email',dst_email='$dst_email',subject='$subject' WHERE _id='1'";
$db->query($confemail);

header('location:configure_notifications.php');

?>
