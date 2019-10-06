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

  $ambil_type="SELECT type_device FROM devices WHERE id_device='$id_device'";
  $hasil_type=$db->query($ambil_type);
  while($rowss=mysqli_fetch_array($hasil_type,MYSQLI_ASSOC)){
    $type=$rowss['type_device'];


    if($type=="Router"){
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
          $hostname= snmpget($ip_device,$user_community,"1.3.6.1.2.1.1.5.0");
              if($hostname!=''){
                //Hostname
                $host=substr($hostname,8);
                //UpTime
                $uptime = snmpget($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
                $up=substr($uptime,12);
                //MemoryUsage
                $usedmemory = snmpget($ip_device,$user_community,'1.3.6.1.2.1.25.2.3.1.6.65536');
                $used=substr($usedmemory,8);
                //TotalMemory
                $totalmemory = snmpget($ip_device,$user_community,'1.3.6.1.2.1.25.2.3.1.5.65536');
                $total=substr($totalmemory,8);
                //$cpuFrekuensi
              	$cpufrekuensi = snmpget($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.14.0');
              	if($cpufrekuensi!=''){
			$cpufre=substr($cpufrekuensi,8);
	     	 }else{
			$cpufre=0;
	      	}

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



                //sql
                $addresources="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$upp','$used','$total','$cpufre')";
                $db->query($addresources);
               /*
		 echo "ADA
                <br>
                $host<br>
                $up<br>
                $used<br>
                $total <br>
                $cpufre<br>";
		*/
              }
              else {
              //  echo "No response SNMPv1 from $ip_device";

              }

        }

        //snmpv2
        elseif($snmp_version==2) {
         // echo "Version 2";
          $hostname= snmp2_get($ip_device,$user_community,"1.3.6.1.2.1.1.5.0");
            if($hostname!=''){
              //Hostname
              $host=substr($hostname,8);
              //UpTime
              $uptime = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
              $up=substr($uptime,12);
              //MemoryUsage
              $usedmemory = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.25.2.3.1.6.65536');
              $used=substr($usedmemory,8);
              //TotalMemory
              $totalmemory = snmp2_get($ip_device,$user_community,'1.3.6.1.2.1.25.2.3.1.5.65536');
              $total=substr($totalmemory,8);
              //$cpuFrekuensi
              $cpufrekuensi = snmp2_get($ip_device,$user_community,'1.3.6.1.4.1.14988.1.1.3.14.0');
              if($cpufrekuensi!=''){
		$cpufre=substr($cpufrekuensi,8);
	      }else{
		$cpufre=0;
	      }

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



              //sql
                  $addresources="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$upp','$used','$total','$cpufre')";
                  $db->query($addresources);
		/*
              echo "ADA
              <br>
              $host<br>
              $up<br>
              $used<br>
              $total <br>
              $cpufre<br>";
		*/
            }
            else {
             // echo "No response SNMPv2 from $ip_device";

            }


        }

        //snmpv3 noAuthNoPriv
        elseif ($snmp_version==3 AND $mechanism=="noAuthNoPriv") {
          echo "Version3-noAuthNoPriv";
          $hostname = snmp3_get($ip_device,$user_community,$mechanism,'1.3.6.1.2.1.1.5.0');
            if($hostname!=''){
              //Hostname
              $host=substr($hostname,8);
              //UpTime
              $uptime = snmp3_get($ip_device,$user_community,$mechanism,'1.3.6.1.2.1.1.3.0');
              $up=substr($uptime,12);
              //MemoryUsage
              $usedmemory = snmp3_get($ip_device,$user_community,$mechanism,'1.3.6.1.2.1.25.2.3.1.6.65536');
              $used=substr($usedmemory,8);
              //TotalMemory
              $totalmemory = snmp3_get($ip_device,$user_community,$mechanism,'1.3.6.1.2.1.25.2.3.1.5.65536');
              $total=substr($totalmemory,8);
              //$cpuFrekuensi
              $cpufrekuensi = snmp3_get($ip_device,$user_community,$mechanism,'1.3.6.1.4.1.14988.1.1.3.14.0');
              if($cpufrekuensi!=''){
		$cpufre=substr($cpufrekuensi,8);
	      }else{
		$cpufre=0;
	      }

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



              //sql
                  $addresources="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$upp','$used','$total','$cpufre')";
                  $db->query($addresources);
		/*
              echo "ADA
              <br>
              $host<br>
              $up<br>
              $used<br>
              $total <br>
              $cpufre<br>";
		*/
            }
            else {
             // echo "No response SNMPv3 noAuthNoPriv from $ip_device";
            }
        }
        //snmpv3 authNoPriv
        elseif ($snmp_version==3 AND $mechanism=="authNoPriv") {
        //  echo "Version3-authNoPriv";
          $hostname = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.1.5.0');
            if($hostname!=''){
              //Hostname
              $host=substr($hostname,8);
              //UpTime
              $uptime = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.1.3.0');
              $up=substr($uptime,12);
              //MemoryUsage
              $usedmemory = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.25.2.3.1.6.65536');
              $used=substr($usedmemory,8);
              //TotalMemory
              $totalmemory = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.2.1.25.2.3.1.5.65536');
              $total=substr($totalmemory,8);
              //$cpuFrekuensi
              $cpufrekuensi = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,'1.3.6.1.4.1.14988.1.1.3.14.0');
              if($cpufrekuensi!=''){
		$cpufre=substr($cpufrekuensi,8);
	      }else{
		$cpufre=0;
	      }

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



              //sql
                  $addresources="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$upp','$used','$total','$cpufre')";
                  $db->query($addresources);
		/*
              echo "ADA
              <br>
              $host<br>
              $up<br>
              $used<br>
              $total <br>
              $cpufre<br>";
		*/
            }
            else {
             // echo "No response SNMPv3 AuthNoPriv from $ip_device";
            }
        }
        //snmpv3 authPriv
        elseif ($snmp_version==3 AND $mechanism=="authPriv") {
          //echo "Version3-authPriv";
          $hostname = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.1.5.0');
            if($hostname!=''){
              //Hostname
              $host=substr($hostname,8);
              //UpTime
              $uptime = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.1.3.0');
              $up=substr($uptime,12);
              //MemoryUsage
              $usedmemory = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.25.2.3.1.6.65536');
              $used=substr($usedmemory,8);
              //TotalMemory
              $totalmemory = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.2.1.25.2.3.1.5.65536');
              $total=substr($totalmemory,8);
              //cpuFrekuensi
              
              $cpufrekuensi = snmp3_get($ip_device,$user_community,$mechanism,$auth_protocol,$auth_password,$encrypt_protocol,$encrypt_password,'1.3.6.1.4.1.14988.1.1.3.14.0');
              if($cpufrekuensi!=''){
		$cpufre=substr($cpufrekuensi,8);
	      }else{
		$cpufre=0;
	      }
	      
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



              //sql
                 $addresources="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$upp','$used','$total','$cpufre')";
                 $db->query($addresources);
		/*
                echo"
                <br>
                $host<br>
                $up<br>
                $used<br>
                $total <br>
                $cpufre<br>
                ";
		*/

            }
            else {
                //echo "No response SNMPv3 AuthPriv from $ip_device";
            }

        }
        else {
        //  echo "No response SNMP Version";
        }

    }
    //PC
    elseif($type=="PC") {
        //echo "PC<br>";
        $hostname= snmpget($ip_device,$user_community,"1.3.6.1.2.1.1.5.0");
        if($hostname!=''){
          //Hostname
          $host=substr($hostname,8);
          //UpTime
          $uptime = snmpget($ip_device,$user_community,'1.3.6.1.2.1.1.3.0');
          $up=substr($uptime,12);
          $memory=snmpget($ip_device,$user_community,'1.3.6.1.2.1.25.2.2.0');
          $totalmemory=substr($memory,8);
	  $total=intval($totalmemory);
          $cpu=snmpget($ip_device,$user_community,'1.3.6.1.2.1.25.1.6.0');
          $Proccess=substr($cpu,8);
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

			
          //sql
          $addresources="INSERT INTO resources VALUES ('$id_connection','$jam','$tgl','$host','$upp',NULL,'$total','$Proccess')";
          $db->query($addresources);
/*
          echo"
          <br>
          $host<br>
          $up,$upp<br>
          $total<br>
          $Proccess<br>
          ";
*/
        }
        else {
       //   echo "No response SNMP Version Form $ip_device";
        }


    }else {
     // echo "NO Type Device";
    }

  }


}


?>
