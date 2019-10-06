<?php

   require_once("koneksi/koneksi.php");
   $id=$_POST['id'];
   $grup=$_POST['grup'];
   $name=$_POST['name'];
   $type_device=$_POST['type_device'];
   $description=$_POST['description'];
   $location=$_POST['location'];
   $ip_device=$_POST['ip_device'];
   $user_community=$_POST['user_community'];
   $snmp_version=$_POST['snmp_version'];
   $mechanism=$_POST['mechanism'];
   $auth_protocol=$_POST['auth_protocol'];
   $auth_password=$_POST['auth_password'];
   $encrypt_protocol=$_POST['encrypt_protocol'];
   $encrypt_password=$_POST['encrypt_password'];


     $datadevice="UPDATE devices SET grup='$grup',name='$name',type_device='$type_device',description='$description',location='$location' WHERE id_device='$id'";
     $db->query($datadevice);

     $dataconnect = "UPDATE connection SET ip_device='$ip_device',snmp_version='$snmp_version',user_community='$user_community',mechanism='$mechanism',auth_protocol='$auth_protocol',auth_password='$auth_password',encrypt_protocol='$encrypt_protocol',encrypt_password='$encrypt_password' WHERE id_device='$id'";
     $simpanconnect = $db->query($dataconnect);
     if($simpanconnect) {
        header('location:configure_existing.php');
     }
     else
     {
        echo "<div align='center'>Proses Gagal!</div>";
     }






?>
