<?php

   require_once("koneksi/koneksi.php");

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

     $datadevice="INSERT INTO devices VALUES (NULL,'$grup','$name','$type_device','$description','$location')";
     $db->query($datadevice);


     $ambil_iddevice="SELECT id_device FROM devices ORDER BY id_device DESC LIMIT 1";
     $hasil_ambil=$db->query($ambil_iddevice);
     while($row=mysqli_fetch_array($hasil_ambil,MYSQLI_ASSOC)){
	      $id_device=$row['id_device'];

           $dataconnect = "INSERT INTO connection VALUES (NULL,'$id_device','$ip_device','$snmp_version','$user_community','$mechanism','$auth_protocol','$auth_password','$encrypt_protocol','$encrypt_password',NULL)";
           $simpanconnect = $db->query($dataconnect);
           if($simpanconnect) {
               header('location:configure_existing.php');
           }
           else
           {
               echo "<div align='center'>Proses Gagal!</div>";
           }

    }




?>
