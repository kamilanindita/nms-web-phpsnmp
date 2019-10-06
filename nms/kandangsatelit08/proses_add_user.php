<?php
  require_once("../koneksi/koneksi.php");
   $username=$_POST['username'];
   $password=$_POST['password'];

   $adduser="INSERT INTO users VALUES (NULL,'$username','$password',NULL,NULL)";
   $db->query($adduser);
   header('location:buat_baru_user.html');

?>
