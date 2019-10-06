<?php

//ambil id_connection
require_once("../koneksi/koneksi.php");
$ambil_dev="SELECT id_connection FROM connection";
$hasil_dev=$db->query($ambil_dev);
while($rows=mysqli_fetch_array($hasil_dev,MYSQLI_ASSOC)){
  $id_connection=$rows['id_connection'];
  //menghitung jml interface
    require_once("../koneksi/koneksi.php");
    $ambil_int="SELECT * FROM interfaces WHERE id_connection='$id_connection'";
    $intname=array();
    $hasil_int=$db->query($ambil_int);
    while($row=mysqli_fetch_array($hasil_int,MYSQLI_ASSOC)){
    $intname[]=$row['intname'];
    }

  $blm=array_count_values($intname);
  $hasil=count($blm);
  //mengambil interface name
  require_once("../koneksi/koneksi.php");
  $ambil_int="SELECT * FROM interfaces WHERE id_connection='$id_connection'";
  $hasil_int=$db->query($ambil_int);
  $jmlint=$hasil;
  $a=0;
  while($row=mysqli_fetch_array($hasil_int,MYSQLI_ASSOC)){
  $intname=$row['intname'];
  $a=$a+1;
    if($a==$jmlint+1){
    break;
    }
    else{
      //mengambil status interface 3 terbaru dan membandingkan
      require_once("../koneksi/koneksi.php");
      $ambil_kondisi="SELECT * FROM interfaces WHERE id_connection='$id_connection' AND intname='$intname' ORDER BY dates DESC ,times DESC LIMIT 1";
      $hasil_kondisi=$db->query($ambil_kondisi);
      while($row=mysqli_fetch_array($hasil_kondisi,MYSQLI_ASSOC)){
          $uptimes=$row['uptime'];
          $times=$row['times'];
          $dates=$row['dates'];
          $intstatus=$row['intstatus'];
      }

    //  global $times,$dates,$intstatuss,$hostname,$intname,$uptimes;
      //Hostname
      require_once("../koneksi/koneksi.php");
      $ambil_hostname="SELECT hostname FROM resources WHERE id_connection='$id_connection' ORDER BY dates DESC,times DESC LIMIT 1";
      $hasil_hostname=$db->query($ambil_hostname);
      while($row1=mysqli_fetch_array($hasil_hostname,MYSQLI_ASSOC)){
        $hostname=$row1['hostname'];
      }

    //  echo "$hostname,$intname ,$uptime,$times,$date,$intstatus<br>";
          //cek tabel int_log sudah ada blm
          require_once("../koneksi/koneksi.php");
          $sql = "SELECT * FROM log_int WHERE id_connection='$id_connection' AND intname='$intname'";
          $query = $db->query($sql);
          $hasil = $query->fetch_assoc();
          //blm ada/masih baru
          if($query->num_rows == 0) {
            require_once("../koneksi/koneksi.php");
            $perbarui="INSERT INTO log_int VALUES ('$id_connection','$times','$dates','$uptimes','$intname','$intstatus')";
            $db->query($perbarui);
          }
          //sudah ada tinggal di cek
          else {
            $ambil_log="SELECT * FROM log_int WHERE id_connection='$id_connection' AND intname='$intname' ORDER BY dates DESC ,times DESC LIMIT 1";
            $hasil_log=$db->query($ambil_log);
            while($row2=mysqli_fetch_array($hasil_log,MYSQLI_ASSOC)){
              $uptime1=$row2['uptime'];
              $times1=$row2['times'];
              $dates1=$row2['dates'];
              $intstatus1=$row2['intstatus'];

   //           echo "$uptimes , $times , $dates , $intstatus <br>$uptime1 , $times1, $dates1 , $intstatus1<br>";

              if($times1==$times AND $intstatus1==$intstatus){
            //    echo "biarin waktu dan status sama<br>";
              }elseif($times1!=$times AND $intstatus1==$intstatus){
           //     echo "biarin statusnya sama<br>";
              }else{
           //     echo "tulis<br>";
                require_once("../koneksi/koneksi.php");
                $perbarui="INSERT INTO log_int VALUES ('$id_connection','$times','$dates','$uptimes','$intname','$intstatus')";
                $db->query($perbarui);
                if($intstatus==1){
                  global $times5,$dates5,$intstatuss5,$hostname5,$intname5,$uptimes5;
                  $times5=$times;
                  $dates5=$dates;
                  $hostname5=$hostname;
                  $intname5=$intname;
                  $uptimes5=$uptimes;
                  $intstatuss5="UP";
                  include('kirimketelegram.php');
                  include('kirimkeemail.php');
                }elseif($intstatus==2){
                  global $times5,$dates5,$intstatuss5,$hostname5,$intname5,$uptimes5;
                  $times5=$times;
                  $dates5=$dates;
                  $hostname5=$hostname;
                  $intname5=$intname;
                  $uptimes5=$uptimes;
                  $intstatuss5="DOWN";
                  include('kirimketelegram.php');
                  include('kirimkeemail.php');
                }else {
                  // code...
                }
              }

            }

          }







    }
  }
}


?>
