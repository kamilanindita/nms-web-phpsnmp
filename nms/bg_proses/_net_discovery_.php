<?php


require_once("../koneksi/koneksi.php");
$ambil_connect="SELECT id_connection,id_device,ip_device,status FROM connection";
$hasil_connect=$db->query($ambil_connect);
while($row=mysqli_fetch_array($hasil_connect,MYSQLI_ASSOC)){
$id_connection=$row['id_connection'];
$id_device=$row['id_device'];
$ip_device=$row['ip_device'];
$status=$row['status'];

    $ambil_device="SELECT name FROM devices WHERE id_device='$id_device'";
    $hasil_device=$db->query($ambil_device);
    while($row1=mysqli_fetch_array($hasil_device,MYSQLI_ASSOC)){
      $name=$row1['name'];
    }


            $output=shell_exec('ping -c 2 '.$ip_device);

           
            if (strpos($output, 'time=') !== false) {
            //echo "$name Dengan $ip_device : Connected";
	    if($status=='' OR $status=='Request Timed Out' OR $status=='Destination Host Unreachable'){
                $perbarui="UPDATE connection SET status='Connected' WHERE id_connection='$id_connection'";
                $db->query($perbarui);
                global $nama,$kondisi;
                $nama=$name;
                $kondisi='Connected';
                include('kirimtele.php');
                include('kirimemail.php');
              }
            }
            elseif(strpos($output, ' ') !== false){
            //echo "$name Dengan $ip_device : Destination Host Unreachable";
              if($status=='' OR $status=='Request Timed Out' OR $status=='Connected'){
                $perbarui="UPDATE connection SET status='Destination Host Unreachable' WHERE id_connection='$id_connection'";
                $db->query($perbarui);
                global $nama,$kondisi;
                $nama=$name;
                $kondisi='Destination Host Unreachable';
                include('kirimtele.php');
                include('kirimemail.php');
              }
            }
            elseif(strpos($output, 'Destination Host Unreachable') !== false){
            //echo "$name Dengan $ip_device : gk";
              if($status=='' OR $status=='Connected'){
                $perbarui="UPDATE connection SET status='Destination Host Unreachable' WHERE id_connection='$id_connection'";
                $db->query($perbarui);
                global $nama,$kondisi;
                $nama=$name;
                $kondisi='Destination Host Unreachable';
                include('kirimtele.php');
                include('kirimemail.php');
              }
            }
            else
            {
            //echo "Unknown Error";
            }


            //echo" <br>";


}

?>
