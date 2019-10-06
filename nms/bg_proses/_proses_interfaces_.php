<?php

require_once("../koneksi/koneksi.php");
$ambil_connect="SELECT * FROM connection";
$hasil_connect=$db->query($ambil_connect);
while($row=mysqli_fetch_array($hasil_connect,MYSQLI_ASSOC)){
  $id_connection=$row['id_connection'];
  $id_device=$row['id_device'];
  $ip_device=$row['ip_device'];
  $user_community=$row['user_community'];
  $snmp_version=$row['snmp_version'];
  $mechanism=$row['mechanism'];
  $auth_protocol=$row['auth_protocol'];
  $auth_password=$row['auth_password'];
  $encrypt_protocol=$row['encrypt_protocol'];
  $encrypt_password=$row['encrypt_password'];
  $device_status=$row['status'];


require_once("../koneksi/koneksi.php");
$ambil_type="SELECT type_device FROM devices WHERE id_device='$id_device'";
$hasil_type=$db->query($ambil_type);
while($rowss=mysqli_fetch_array($hasil_type,MYSQLI_ASSOC)){

  $type=$rowss['type_device'];
  if($type=='Router' AND $device_status=='Connected'){
    
      date_default_timezone_set('Asia/Jakarta');
      $tgl=date("Y-m-d");
      $jam=date("H:i:s");

/*
      echo"
      <br>
      $ip_device &nbsp;
      $user_community &nbsp;
      $snmp_version &nbsp;
      $mechanism &nbsp;
      $auth_protocol &nbsp;
      $auth_password &nbsp;
      $encrypt_protocol &nbsp;
      $encrypt_password &nbsp;<br>
      ";
*/
        //snmpv1
        if($snmp_version==1){
     //     echo"Version 1";
          $interfacename = snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.2.1');
          if($interfacename!=''){
            for($i=1;$i<49;$i++){
              $interfacename = snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.2.'.$i.'');
                if($interfacename!=''){
                  //intname
                  $intname=substr($interfacename,8);
                  //uptime
                  $uptime = snmpget($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
                  $up=substr($uptime,12);
                  //intmac
                  $mac=snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.6.'.$i.'');
                  $macadd=substr($mac,11);
                  //intstatus
                  $intstatus = snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.8.'.$i.'');
                  $instatuss=substr($intstatus,8);

		  if($instatuss==1 OR $instatuss==2){
    	             $operstatus=$instatuss;
		  }elseif($instatuss!=1 OR $instatuss!=2){
		    $balik=strrev($instatuss);
		    $ambil=substr($balik,1);
  		    $ambilint=intval($ambil);
 		    $operstatus=$ambilint;
		   }else{
 
		   }

                  //intspeed
                  $intspeed = snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.5.'.$i.'');
                  $speed=substr($intspeed,8);
                  //bytesin
                  $bytes_in=snmpget($ip_device,$user_community,'1.3.6.1.2.1.31.1.1.1.6.'.$i.'');
                  $bytein=substr($bytes_in,10);
                  //bytesout
                  $bytes_out=snmpget($ip_device,$user_community,'1.3.6.1.2.1.31.1.1.1.10.'.$i.'');
                  $byteout=substr($bytes_out,10);
                  //errorin
                  $error_in=snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.14.'.$i.'');
                  $error=substr($error_in,10);
                  //discardin
                  $discard_in=snmpget($ip_device,$user_community, '1.3.6.1.2.1.2.2.1.13.'.$i.'');
                  $discard=substr($discard_in,10);

		  $seconds=intval($up)/100;

			if($seconds>3600){
				$jams=intval($seconds/3600);
				$men=$seconds%3600;
				if($men>60){
					$menit=intval($men/60);
					$detik=$men%60;
				}elseif($men<60){
					$menit="00";
					$detik=$men;
				}
				$upp=$jams.":".$menit.":".$detik;
			}elseif($seconds>60){
				$menit=intval($seconds/60);
				$detik=$seconds%60;
				$upp="00:".$menit.":".$detik;
			}elseif($seconds<60){
				$detik=$seconds;
				$upp="00:00:".$detik;
			}else{
			}



                  //sql
                  $addresources="INSERT INTO interfaces VALUES ('$id_connection','$upp','$jam','$tgl','$intname','$macadd','$operstatus','$speed','$bytein','$byteout','$error','$discard'";
                  $db->query($addresources);
/*
                  echo"
                  <br>
                  Interface Name: $intname<br>
                  &nbsp;&nbsp;MAC-Add:  $macadd<br>
                  &nbsp;&nbsp;Status:   $operstatus<br>
                  &nbsp;&nbsp;Speed: $speed<br>
                  &nbsp;&nbsp;Bytes-In:  $bytein<br>
                  &nbsp;&nbsp;Bytes-Out:  $byteout<br>
                  &nbsp;&nbsp;Error-In:  $error<br>
                  &nbsp;&nbsp;Discard-In:  $discard<br>";
*/
                }
                else {
               //   echo "Not found oid";
                  break;
                }
            }
          }else {
           // echo "No response SNMPv1 from $ip_device";
          }
        }

        //snmpv2
        elseif ($snmp_version==2) {
       //   echo"Version 2";
          $interfacename = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.2.1');
          if($interfacename!=''){
            for($i=1;$i<49;$i++){
              $interfacename = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.2.'.$i.'');
                if($interfacename!=''){
                  //intname
                  $intname=substr($interfacename,8);
                  //uptime
                  $uptime = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
                  $up=substr($uptime,12);
                  //intmac
                  $mac=snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.6.'.$i.'');
                  $macadd=substr($mac,11);
                  //intstatus
                  $intstatus = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.8.'.$i.'');
                  $instatuss=substr($intstatus,8);

		  if($instatuss==1 OR $instatuss==2){
    	             $operstatus=$instatuss;
		  }elseif($instatuss!=1 OR $instatuss!=2){
		    $balik=strrev($instatuss);
		    $ambil=substr($balik,1);
  		    $ambilint=intval($ambil);
 		    $operstatus=$ambilint;
		   }else{
 
		   }

                  //intspeed
                  $intspeed = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.5.'.$i.'');
                  $speed=substr($intspeed,8);
                  //bytesin
                  $bytes_in=snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.31.1.1.1.6.'.$i.'');
                  $bytein=substr($bytes_in,10);
                  //bytesout
                  $bytes_out=snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.31.1.1.1.10.'.$i.'');
                  $byteout=substr($bytes_out,10);
                  //errorin
                  $error_in=snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.14.'.$i.'');
                  $error=substr($error_in,10);
                  //discardin
                  $discard_in=snmp2_get($ip_device,$user_community, '1.3.6.1.2.1.2.2.1.13.'.$i.'');
                  $discard=substr($discard_in,10);

		  $seconds=intval($up)/100;

			if($seconds>3600){
				$jams=intval($seconds/3600);
				$men=$seconds%3600;
				if($men>60){
					$menit=intval($men/60);
					$detik=$men%60;
				}elseif($men<60){
					$menit="00";
					$detik=$men;
				}
				$upp=$jams.":".$menit.":".$detik;
			}elseif($seconds>60){
				$menit=intval($seconds/60);
				$detik=$seconds%60;
				$upp="00:".$menit.":".$detik;
			}elseif($seconds<60){
				$detik=$seconds;
				$upp="00:00:".$detik;
			}else{
			}



                  //sql
                    $addresources="INSERT INTO interfaces VALUES ('$id_connection','$upp','$jam','$tgl','$intname','$macadd','$operstatus','$speed','$bytein','$byteout','$error','$discard')";
                    $db->query($addresources);
/*
                  echo"
                  <br>
                  Interface Name: $intname<br>
                  &nbsp;&nbsp;MAC-Add:  $macadd<br>
                  &nbsp;&nbsp;Status:   $operstatus<br>
                  &nbsp;&nbsp;Speed: $speed<br>
                  &nbsp;&nbsp;Bytes-In:  $bytein<br>
                  &nbsp;&nbsp;Bytes-Out:  $byteout<br>
                  &nbsp;&nbsp;Error-In:  $error<br>
                  &nbsp;&nbsp;Discard-In:  $discard<br>";
*/
                }
                else {
                //  echo "Not found oid";
                  break;
                }
            }
          }else {
          //  echo "No response SNMPv2 from $ip_device";
          }
        }

        //snmpv3 noAuthNoPriv
        elseif ($snmp_version==3 AND $mechanism=="noAuthNoPriv") {
       //   echo "Version3-authNoPriv";
          $interfacename = snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.2.1');
          if($interfacename!=''){
            for($i=1;$i<49;$i++){
              $interfacename = snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.2.'.$i.'');
                if($interfacename!=''){
                  //intname
                  $intname=substr($interfacename,8);
                  //uptime
                  $uptime = snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
                  $up=substr($uptime,12);
                  //intmac
                  $mac=snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.6.'.$i.'');
                  $macadd=substr($mac,11);
                  //intstatus
                  $intstatus = snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.8.'.$i.'');
                  $instatuss=substr($intstatus,8);

		  if($instatuss==1 OR $instatuss==2){
    	             $operstatus=$instatuss;
		  }elseif($instatuss!=1 OR $instatuss!=2){
		    $balik=strrev($instatuss);
		    $ambil=substr($balik,1);
  		    $ambilint=intval($ambil);
 		    $operstatus=$ambilint;
		   }else{
 
		   }

                  //intspeed
                  $intspeed = snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.5.'.$i.'');
                  $speed=substr($intspeed,8);
                  //bytesin
                  $bytes_in=snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.31.1.1.1.6.'.$i.'');
                  $bytein=substr($bytes_in,10);
                  //bytesout
                  $bytes_out=snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.31.1.1.1.10.'.$i.'');
                  $byteout=substr($bytes_out,10);
                  //errorin
                  $error_in=snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.14.'.$i.'');
                  $error=substr($error_in,10);
                  //discardin
                  $discard_in=snmp3_get($ip_device,$user_community, '1.3.6.1.2.1.2.2.1.13.'.$i.'');
                  $discard=substr($discard_in,10);

		  $seconds=intval($up)/100;

			if($seconds>3600){
				$jams=intval($seconds/3600);
				$men=$seconds%3600;
				if($men>60){
					$menit=intval($men/60);
					$detik=$men%60;
				}elseif($men<60){
					$menit="00";
					$detik=$men;
				}
				$upp=$jams.":".$menit.":".$detik;
			}elseif($seconds>60){
				$menit=intval($seconds/60);
				$detik=$seconds%60;
				$upp="00:".$menit.":".$detik;
			}elseif($seconds<60){
				$detik=$seconds;
				$upp="00:00:".$detik;
			}else{
			}



                  //sql
                    $addresources="INSERT INTO interfaces VALUES ('$id_connection','$upp','$jam','$tgl','$intname','$macadd','$operstatus','$speed','$bytein','$byteout','$error','$discard')";
                    $db->query($addresources);
/*
                  echo"
                  <br>
                  Interface Name: $intname<br>
                  &nbsp;&nbsp;MAC-Add:  $macadd<br>
                  &nbsp;&nbsp;Status:   $operstatus<br>
                  &nbsp;&nbsp;Speed: $speed<br>
                  &nbsp;&nbsp;Bytes-In:  $bytein<br>
                  &nbsp;&nbsp;Bytes-Out:  $byteout<br>
                  &nbsp;&nbsp;Error-In:  $error<br>
                  &nbsp;&nbsp;Discard-In:  $discard<br>";
*/
                }
                else {
                 //cho "Not found oid";
                  break;
                }
            }
          }else {
           //cho "No response SNMPv3-noauthNoPriv from $ip_device";
          }
        }

        //snmpv3 authNoPriv
        elseif ($snmp_version==3 AND $mechanism=="authNoPriv") {
      //  echo "Version3-authNoPriv";
          $interfacename = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.2.1');
          if($interfacename!=''){
            for($i=1;$i<49;$i++){
              $interfacename = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.2.'.$i.'');
                if($interfacename!=''){
                  //intname
                  $intname=substr($interfacename,8);
                  //uptime
                  $uptime = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.1.3.0');
                  $up=substr($uptime,12);
                  //intmac
                  $mac=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.6.'.$i.'');
                  $macadd=substr($mac,11);
                  //intstatus
                  $intstatus = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.8.'.$i.'');
                  $instatuss=substr($intstatus,8);

		  if($instatuss==1 OR $instatuss==2){
    	             $operstatus=$instatuss;
		  }elseif($instatuss!=1 OR $instatuss!=2){
		    $balik=strrev($instatuss);
		    $ambil=substr($balik,1);
  		    $ambilint=intval($ambil);
 		    $operstatus=$ambilint;
		   }else{
 
		   }
                  //intspeed
                  $intspeed = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.5.'.$i.'');
                  $speed=substr($intspeed,8);
                  //bytesin
                  $bytes_in=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.31.1.1.1.6.'.$i.'');
                  $bytein=substr($bytes_in,10);
                  //bytesout
                  $bytes_out=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.31.1.1.1.10.'.$i.'');
                  $byteout=substr($bytes_out,10);
                  //errorin
                  $error_in=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.14.'.$i.'');
                  $error=substr($error_in,10);
                  //discardin
                  $discard_in=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.2.2.1.13.'.$i.'');
                  $discard=substr($discard_in,10);

		  $seconds=intval($up)/100;

			if($seconds>3600){
				$jams=intval($seconds/3600);
				$men=$seconds%3600;
				if($men>60){
					$menit=intval($men/60);
					$detik=$men%60;
				}elseif($men<60){
					$menit="00";
					$detik=$men;
				}
				$upp=$jams.":".$menit.":".$detik;
			}elseif($seconds>60){
				$menit=intval($seconds/60);
				$detik=$seconds%60;
				$upp="00:".$menit.":".$detik;
			}elseif($seconds<60){
				$detik=$seconds;
				$upp="00:00:".$detik;
			}else{
			}




                  //sql
                    $addresources="INSERT INTO interfaces VALUES ('$id_connection','$upp','$jam','$tgl','$intname','$macadd','$operstatus','$speed','$bytein','$byteout','$error','$discard')";
                    $db->query($addresources);
/*
                  echo"
                  <br>
                  Interface Name: $intname<br>
                  &nbsp;&nbsp;MAC-Add:  $macadd<br>
                  &nbsp;&nbsp;Status:   $operstatus<br>
                  &nbsp;&nbsp;Speed: $speed<br>
                  &nbsp;&nbsp;Bytes-In:  $bytein<br>
                  &nbsp;&nbsp;Bytes-Out:  $byteout<br>
                  &nbsp;&nbsp;Error-In:  $error<br>
                  &nbsp;&nbsp;Discard-In:  $discard<br>";
*/
                }
                else {
                 //cho "Not found oid";
                  break;
                }
            }
          }else {
          //echo "No response SNMPv3-authNoPriv from $ip_device";
          }
        }

        //snmpv3 authPriv
        elseif ($snmp_version==3 AND $mechanism=="authPriv"){
       // echo "Version3-authPriv";
          $interfacename = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password, '1.3.6.1.2.1.2.2.1.2.1');
          if($interfacename!=''){
            for($i=1;$i<49;$i++){
              $interfacename = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password, '1.3.6.1.2.1.2.2.1.2.'.$i.'');
                if($interfacename!=''){
                  //intname
                  $intname=substr($interfacename,8);
                  //uptime
                  $uptime = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.1.3.0');
                  $up=substr($uptime,12);
                  //intmac
                  $mac=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password, '1.3.6.1.2.1.2.2.1.6.'.$i.'');
                  $macadd=substr($mac,11);
                  //intstatus
                  $intstatus = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password, '1.3.6.1.2.1.2.2.1.8.'.$i.'');
                  $instatuss=substr($intstatus,8);

		  if($instatuss==1 OR $instatuss==2){
    	             $operstatus=$instatuss;
		  }elseif($instatuss!=1 OR $instatuss!=2){
		    $balik=strrev($instatuss);
		    $ambil=substr($balik,1);
  		    $ambilint=intval($ambil);
 		    $operstatus=$ambilint;
		   }else{
 
		   }

                  //intspeed
                  $intspeed = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password, '1.3.6.1.2.1.2.2.1.5.'.$i.'');
                  $speed=substr($intspeed,8);
                  //bytesin
                  $bytes_in=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.31.1.1.1.6.'.$i.'');
                  $bytein=substr($bytes_in,10);
                  //bytesout
                  $bytes_out=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.31.1.1.1.10.'.$i.'');
                  $byteout=substr($bytes_out,10);
                  //errorin
                  $error_in=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.2.2.1.14.'.$i.'');
                  $error=substr($error_in,10);
                  //discardin
                  $discard_in=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.2.2.1.13.'.$i.'');
                  $discard=substr($discard_in,10);
                  
		  $seconds=intval($up)/100;

			if($seconds>3600){
				$jams=intval($seconds/3600);
				$men=$seconds%3600;
				if($men>60){
					$menit=intval($men/60);
					$detik=$men%60;
				}elseif($men<60){
					$menit="00";
					$detik=$men;
				}
				$upp=$jams.":".$menit.":".$detik;
			}elseif($seconds>60){
				$menit=intval($seconds/60);
				$detik=$seconds%60;
				$upp="00:".$menit.":".$detik;
			}elseif($seconds<60){
				$detik=$seconds;
				$upp="00:00:".$detik;
			}else{
			}



		   //sql
                    $addresources="INSERT INTO interfaces VALUES('$id_connection','$upp','$jam','$tgl','$intname','$macadd','$operstatus','$speed','$bytein','$byteout','$error','$discard')";
                    $db->query($addresources);
/*
                  echo"
                  <br>
		  id=$id_connection<br>$up<br>$tgl,$jam<br>
                  Interface Name: $intname<br>
                  &nbsp;&nbsp;MAC-Add:  $macadd<br>
                  &nbsp;&nbsp;Status:   $operstatus<br>
                  &nbsp;&nbsp;Speed: $speed<br>
                  &nbsp;&nbsp;Bytes-In:  $bytein<br>
                  &nbsp;&nbsp;Bytes-Out:  $byteout<br>
                  &nbsp;&nbsp;Error-In:  $error<br>
                  &nbsp;&nbsp;Discard-In:  $discard<br>";
*/
                }
                else {
                 //cho "Not found oid";
                  break;
                }
            }
          }else {
          //echo "No response SNMPv3-authPriv from $ip_device";
          }
          //  $addints="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$up','$used','$total','$cpufre')";
        //    $db->query($addints);
        }
        else {
       // echo "Not found SNMP version";
        }

  }
  elseif($type="PC"){

    $hostname= snmpget($ip_device,$user_community,"1.3.6.1.2.1.1.5.0");
    if($hostname!='' AND $device_status=='Connected'){
      $uptime = snmpget($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
      $up=substr($uptime,12);
      $intname="Interface 1";
      $intstatus=snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.8.1');
      $operstatus=substr($intstatus,8);

       if($operstatus==1 OR $operstatus==2){
    	   $operstatuss=$operstatus;
	      }elseif($operstatus!=1 OR $operstatus!=2){
	      $balik=strrev($operstatus);
	      $ambil=substr($balik,1);
  	    $ambilint=intval($ambil);
 	      $operstatuss=$ambilint;
	      }else{
 
        }

      $intspeed=snmpget($ip_device,$user_community,'1.3.6.1.2.1.2.2.1.5.1');
      $speed=substr($intspeed,8);
      //sql
      date_default_timezone_set('Asia/Jakarta');
      $tgl=date("Y-m-d");
      $jam=date("H:i:s");

     $seconds=intval($up)/100;

			if($seconds>3600){
				$jams=intval($seconds/3600);
				$men=$seconds%3600;
				if($men>60){
					$menit=intval($men/60);
					$detik=$men%60;
				}elseif($men<60){
					$menit="00";
					$detik=$men;
				}
				$upp=$jams.":".$menit.":".$detik;
			}elseif($seconds>60){
				$menit=intval($seconds/60);
				$detik=$seconds%60;
				$upp="00:".$menit.":".$detik;
			}elseif($seconds<60){
				$detik=$seconds;
				$upp="00:00:".$detik;
			}else{
			}




      $addresources="INSERT INTO interfaces VALUES('$id_connection','$upp','$jam','$tgl','$intname',NULL,'$operstatuss','$speed',NULL,NULL,NULL,NULL)";
      $db->query($addresources);
/*
      echo"
      <br>
      Interface Name: $intname<br>
      &nbsp;&nbsp;Up:  $up<br>
      &nbsp;&nbsp;Status:   $operstatus<br>
      &nbsp;&nbsp;Speed: $speed<br>";
*/
    }elseif($device_status!='Connected'){
      $intname="Interface 1";
      $operstatus=2;
      date_default_timezone_set('Asia/Jakarta');
      $tgl=date("Y-m-d");
      $jam=date("H:i:s");
      //sql
        $addresources="INSERT INTO interfaces VALUES('$id_connection','0','$jam','$tgl','$intname',NULL,'$operstatus',NULL,NULL,NULL,NULL,NULL)";
        $db->query($addresources);
    //echo "No Response SNMP From $ip_device";
    }


  }
  else {
  //echo "Tdk ADA DEVICE";
  }


 }
}

?>
