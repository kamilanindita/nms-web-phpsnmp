<?php

    $message = "Monitoring System \n $nama \n\n \"$kondisi\""; 

    require_once("../koneksi/koneksi.php");
    $ambil_conf_tel="SELECT * FROM conf_email WHERE _id='1'";
    $hasil_tel=$db->query($ambil_conf_tel);
    while($row=mysqli_fetch_array($hasil_tel,MYSQLI_ASSOC)){
        $from=$row['src_email'];
        $to=$row['dst_email'];
        $subject=$row['subject'];

        if($from=='' OR $to==''){
            break;
        }
        else{
            ini_set( 'display_errors', 1 );   
            error_reporting( E_ALL );    
            $headers = "From:" . $from;    
            mail($to,$subject,$message, $headers);
        }
    }
?>