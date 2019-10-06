<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php');
}
else {
   $username = $_SESSION['username'];
}

$id=$_GET['id'];
require_once("koneksi/koneksi.php");
$ambilcon="SELECT id_connection FROM connection WHERE id_device='$id'";
$hasil_con=$db->query($ambilcon);
while($row1=mysqli_fetch_array($hasil_con,MYSQLI_ASSOC)){
  $id_connection=$row1['id_connection'];


  require_once("koneksi/koneksi.php");
  $deletedevice="DELETE FROM devices WHERE id_device='$id'";
  $db->query($deletedevice);

  $deletecont="DELETE FROM connection WHERE id_device='$id'";
  $db->query($deletecont);

  $deleteresource="DELETE FROM resources WHERE id_connection='$id_connection'";
  $db->query($deleteresource);

  $deletehealth="DELETE FROM health WHERE id_connection='$id_connection'";
  $db->query($deletehealth);

  $deleteinterfaces="DELETE FROM interfaces WHERE id_connection='$id_connection'";
  $db->query($deleteinterfaces);

  $deleteintlog="DELETE FROM log_int WHERE id_connection='$id_connection'";
  $db->query($deleteintlog);

  header('location:configure_existing.php');
}


?>
