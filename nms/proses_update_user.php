<?php



   require_once("koneksi/koneksi.php");
   $id_user=$_POST['id_user'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $name=$_POST['name'];
   $description=$_POST['description'];

   $updateuser="UPDATE users SET username='$username',password='$password',name='$name',description='$description' WHERE id_user='$id_user'";
   $db->query($updateuser);
   session_start();
   session_destroy();
   header('location:profile.php');





?>
