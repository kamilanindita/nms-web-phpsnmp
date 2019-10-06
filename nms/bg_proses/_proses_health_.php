<?php


require_once("../koneksi/koneksi.php");
$ambil_connect="SELECT * FROM connection WHERE status='Connected'";
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


require_once("../koneksi/koneksi.php");
$ambil_type="SELECT type_device FROM devices WHERE id_device='$id_device'";
$hasil_type=$db->query($ambil_type);
while($rowss=mysqli_fetch_array($hasil_type,MYSQLI_ASSOC)){

  $type=$rowss['type_device'];
  if($type=='Router'){

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
    //echo"Version 1";
    $uptime = snmpget($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
      if($uptime!=''){
        $up=substr($uptime,12);
        $voltage=snmpget($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.8.0');
        if($voltage!=''){
          //voltage
          $voltage1=substr($voltage,8)/10;
          //Temperature
          $temperature=snmpget($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.10.0');
          $temperature1=substr($temperature,8)/10;
          //Processor Temperature
          $proccessortemperature=snmpget($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.11.0');
          $proccessortemperature1=substr($proccessortemperature,8)/10;

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

          $addhealth="INSERT INTO health VALUES('$id_connection','$jam','$tgl','$upp','$voltage1','$temperature1','$proccessortemperature1')";
          $db->query($addhealth);
	/*
            echo"
            <br>
            $up<br>
            $voltage1<br>
            $temperature1<br>
            $proccessortemperature1<br>
            ";
	*/
        }else {
         // echo "Tidak ada oid untuk health ip device $ip_device";
        }
      }
      else {
          //echo "No response SNMPv1 from $ip_device";
      }
  }

  //snmpv2
  elseif($snmp_version==2) {
    //echo "Version 2";
    $uptime = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
      if($uptime!=''){
        $up=substr($uptime,12);
        $voltage=snmp2_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.8.0');
        if($voltage!=''){
          //voltage
          $voltage1=substr($voltage,8)/10;
          //Temperature
          $temperature=snmp2_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.10.0');
          $temperature1=substr($temperature,8)/10;
          //Processor Temperature
          $proccessortemperature=snmp2_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.11.0');
          $proccessortemperature1=substr($proccessortemperature,8)/10;

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

          $addhealth="INSERT INTO health VALUES('$id_connection','$jam','$tgl','$upp','$voltage1','$temperature1','$proccessortemperature1')";
          $db->query($addhealth);
	/*
            echo"
            <br>
            $up<br>
            $voltage1<br>
            $temperature1<br>
            $proccessortemperature1<br>
            ";
	*/
        }else {
          //echo "Tidak ada oid untuk health ip device $ip_device";
        }
      }
      else {
          //echo "No response SNMPv2 from $ip_device";
      }
  }

  //snmpv3 noAuthNoPriv
  elseif ($snmp_version==3 AND $mechanism=="noAuthNoPriv") {
   // echo "Version3-noAuthNoPriv";
    $uptime = snmp3_get($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
      if($uptime!=''){
        $up=substr($uptime,12);
        $voltage=snmp3_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.8.0');
        if($voltage!=''){
          //voltage
          $voltage1=substr($voltage,8)/10;
          //Temperature
          $temperature=snmp3_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.10.0');
          $temperature1=substr($temperature,8)/10;
          //Processor Temperature
          $proccessortemperature=snmp3_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.11.0');
          $proccessortemperature1=substr($proccessortemperature,8)/10;

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

          $addhealth="INSERT INTO health VALUES('$id_connection','$jam','$tgl','$upp','$voltage1','$temperature1','$proccessortemperature1')";
          $db->query($addhealth);
		/*
            echo"
            <br>
            $up<br>
            $voltage1<br>
            $temperature1<br>
            $proccessortemperature1<br>
            ";
	*/
        }else {
         // echo "Tidak ada oid untuk health ip device $ip_device";
        }
      }
      else {
        //  echo "No response SNMPv3 noAuthNoPriv from $ip_device";
      }
  }

  //snmpv3 authNoPriv
  elseif ($snmp_version==3 AND $mechanism=="authNoPriv") {
   // echo "Version3-authNoPriv";
    $uptime = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.1.3.0');
      if($uptime!=''){
        $up=substr($uptime,12);
        $voltage=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.4.1.14988.1.1.3.8.0');
        if($voltage!=''){
          //voltage
          $voltage1=substr($voltage,8)/10;
          //Temperature
          $temperature=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.4.1.14988.1.1.3.10.0');
          $temperature1=substr($temperature,8)/10;
          //Processor Temperature
          $proccessortemperature=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.4.1.14988.1.1.3.11.0');
          $proccessortemperature1=substr($proccessortemperature,8)/10;

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

          $addhealth="INSERT INTO health VALUES('$id_connection','$jam','$tgl','$upp','$voltage1','$temperature1','$proccessortemperature1')";
          $db->query($addhealth);
	/*
            echo"
            <br>
            $up<br>
            $voltage1<br>
            $temperature1<br>
            $proccessortemperature1<br>
            ";
	*/
        }else {
          //echo "Tidak ada oid untuk health ip device $ip_device";
        }
      }
      else {
        //  echo "No response SNMPv3 authNoPriv from $ip_device";
      }
  }

  //snmpv3 authPriv
  elseif ($snmp_version==3 AND $mechanism=="authPriv") {
   // echo "Version3-authPriv";
    $uptime = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.1.3.0');
      if($uptime!=''){
        $up=substr($uptime,12);
        $voltage=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.4.1.14988.1.1.3.8.0');
        if($voltage!=''){
          //voltage
          $voltage1=substr($voltage,8)/10;
          //Temperature
          $temperature=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.4.1.14988.1.1.3.10.0');
          $temperature1=substr($temperature,8)/10;
          //Processor Temperature
          $proccessortemperature=snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.4.1.14988.1.1.3.11.0');
          $proccessortemperature1=substr($proccessortemperature,8)/10;

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

          $addhealth="INSERT INTO health VALUES('$id_connection','$jam','$tgl','$upp','$voltage1','$temperature1','$proccessortemperature1')";
          $db->query($addhealth);
	/*
            echo"
            <br>
            $up<br>
            $voltage1<br>
            $temperature1<br>
            $proccessortemperature1<br>
            ";
	*/
        }else {
         // echo "Tidak ada oid untuk health ip device $ip_device";
        }
      }
      else {
        //  echo "No response SNMPv3 authPriv from $ip_device";
      }

  }
  else {
    //echo "No response SNMP Version";
  }

 //otherdevice
  }else{

  }


//caridevice
}




}
?>
