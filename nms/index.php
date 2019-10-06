
<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:/login.php');
}
else {
   $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NMS PUSTEKSAT-Dashboard</title>
  <link rel="icon" type="image/png" href="img/iconlapan.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

      <!--    <i class="fas fa-laugh-wink"></i> -->
         <img class="rounded-circle" src="img/logolapan.jpg" alt="">

        <div class="sidebar-brand-text mx-3">NMS Pusteksat</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Information
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Devices</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Group Devices:</h6>
            <a class="collapse-item" href="device_groups.php">Group</a>
            <a class="collapse-item" href="device_routers.php">Router</a>
            <a class="collapse-item" href="device_wireless.php">Wireless</a>
            <a class="collapse-item" href="device_switchs.php">Switch</a>
            <a class="collapse-item" href="device_servers.php">Server</a>
            <a class="collapse-item" href="device_storages.php">Storage</a>
            <a class="collapse-item" href="device_pc.php">PC</a>
            <a class="collapse-item" href="device_other.php">Other</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Configure</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configure:</h6>
            <a class="collapse-item" href="configure_existing.php">Existing</a>
            <a class="collapse-item" href="configure_new_device.php">Add New Device</a>
            <a class="collapse-item" href="configure_notifications.php">Notifications</a>

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Summary
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.php">
          <!--charts.html-->
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="reports.php">
          <!--tables.html-->
          <i class="fas fa-fw fa-table"></i>
          <span>Reports</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
	  <!--<div class="text-center"><h4>Fault Management dan Accounting Management</h4></div>-->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
	
	
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>
	   
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php
                  echo "$username";
                  ?>
                </span>
                <img class="img-profile rounded-circle" src="img/logolapan.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="edit_profile.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
	 <div id="print-area-1" class="print-area">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	 <!--   <div style="text-align:right;"><a class="no-print d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="javascript:printDiv('print-area-1');"><i class="fas fa-download fa-sm text-white-50">Generate Report</i></a></div> -->
            
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Highest Network Traffic</h6>
                  <div class="dropdown no-arrow">
                </div>
                </div>


		<?php

		    require_once("koneksi/koneksi.php");
                    $ambil_paling="SELECT * FROM interfaces ORDER BY dates DESC,bytes_in DESC LIMIT 1";
                    $hasil_paling=$db->query($ambil_paling);
                    while($rowss=mysqli_fetch_array($hasil_paling,MYSQLI_ASSOC)){
                	        $id_connection=$rowss['id_connection'];
				
				$ambil_nama1="SELECT * FROM resources WHERE id_connection='$id_connection' ORDER BY dates DESC, times DESC LIMIT 1";
                            	$hasil_nama1=$db->query($ambil_nama1);
                           	while($rows31=mysqli_fetch_array($hasil_nama1,MYSQLI_ASSOC)){
                  			$hostnames_hightraffic=$rows31['hostname'];
                			}
				$intnames=$rowss['intname'];
						
			}
		    require_once("koneksi/koneksi.php");
		    $ambil_intname="SELECT * FROM interfaces WHERE id_connection='$id_connection' AND intname='$intnames' ORDER BY dates DESC,times DESC LIMIT 10";
                    $hasil_intname=$db->query($ambil_intname);
                    $bytesin=array();
                    $uptime=array();
                    $bytesout=array();
                    $error_in=array();
                    $discard_in=array();

                    while($row1=mysqli_fetch_array($hasil_intname,MYSQLI_ASSOC)){
                        $uptime[]=strftime($row1['uptime']);
                        $bytesin[]=intval($row1['bytes_in'])/1048576;
                        $bytesout[]=intval($row1['bytes_out'])/1048576;
                        $error_in[]=intval($row['error_in'])/1048576;
                        $discard_in[]=intval($row['discard_in'])/1048576;
                    }
                    $uptimes=array_reverse($uptime);
                    $bytesins=array_reverse($bytesin);
                    $bytesouts=array_reverse($bytesout);
                    $error_ins=array_reverse($error_in);
                    $discard_ins=array_reverse($discard_in);

		


		?>



                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    	<script src="javascript/highcharts.js"></script>
                		<script src="javascript/exporting.js"></script>
                		<div id="interface" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		  
                  </div>
                </div>
		<br><br><br><br>
              </div>
            </div>



<?php
//informasi server

// Display uptime system
// @return string Return uptime system
function uptime() {
	$file_name = "/proc/uptime";

	$fopen_file = fopen($file_name, 'r');
	$buffer = explode(' ', fgets($fopen_file, 4096));
	fclose($fopen_file);

	$sys_ticks = trim($buffer[0]);
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	$result = "";

	if ($days != 0) {
		if ($days > 1)
			$result = "$days " . " days ";
		else
			$result = "$days " . " day ";
	}

	if ($hours != 0) {
		if ($hours > 1)
			$result .= "$hours " . " hours ";
		else
			$result .= "$hours " . " hour ";
	}

	if ($min > 1 || $min == 0)
		$result .= "$min " . " minutes ";
	elseif ($min == 1)
		$result .= "$min " . " minute ";

	return $result;
}


// Display hostname system
// @return string System hostname or none
function get_hostname() {
	$file_name = "/proc/sys/kernel/hostname";

	if ($fopen_file = fopen($file_name, 'r')) {
		$result = trim(fgets($fopen_file, 4096));
		fclose($fopen_file);
	} else {
		$result = "(none)";
	}

	return $result;
}


// Display currenty date/time
// @return string Current system date/time or none
function get_datetime() {
	date_default_timezone_set('Asia/Jakarta');
	if ($today = date("H:i:s, j F Y")) {
		$result = $today;
	} else {
		$result = "(none)";
	}

	return $result;
}



// Get System Load Average
// @return array System Load Average
function get_system_load() {
	$file_name = "/proc/loadavg";
	$result = "";
	$output = "";

	// get the /proc/loadavg information
	if ($fopen_file = fopen($file_name, 'r')) {
		$result = trim(fgets($fopen_file, 256));
		fclose($fopen_file);
	} else {
		$result = "(none)";
	}

	$loadavg = explode(" ", $result);
	$output .= $loadavg[0] . " " . $loadavg[1] . " " . $loadavg[2] . "<br/>";


	// get information the 'top' program
	$file_name = "top -b -n1 | grep \"Tasks:\" -A1";
	$result = "";

	if ($popen_file = popen($file_name, 'r')) {
		$result = trim(fread($popen_file, 2048));
		pclose($popen_file);
	} else {
		$result = "(none)";
	}

	$result = str_replace("\n", "<br/>", $result);
	$output .= $result;

	return $output;
}


// Get Memory System MemTotal|MemFree
// @return array Memory System MemTotal|MemFree
function get_memory() {
	$file_name = "/proc/meminfo";
	$mem_array = array();

	$buffer = file($file_name);

	while (list($key, $value) = each($buffer)) {
		if (strpos($value, ':') !== false) {
			$match_line = explode(':', $value);
			$match_value = explode(' ', trim($match_line[1]));
			if (is_numeric($match_value[0])) {
				$mem_array[trim($match_line[0])] = trim($match_value[0]);
			}
		}
	}

	return $mem_array;
}


//Get FreeDiskSpace
function get_hdd_freespace() {
$df = disk_free_space("/");
return $df;
}


// Convert value to MB
// @param decimal $value
// @return int Memory MB
function convert_ToMB($value) {
	return round($value / 1024) . " MB\n";
}

$meminfo = get_memory();
$memused = ($meminfo['MemTotal'] - $meminfo['MemFree']);
?>



            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Server Resources</h6>
              </div>
	      <div>
		   <div class="text-left">
		   <b>&nbsp;General Information</b><br>
		   &nbsp;&nbsp;&nbsp;<b>Hostname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</b><?=get_hostname();?>
		   <br>
		   &nbsp;&nbsp;&nbsp;<b>UpTime&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</b><?=uptime();?>
		   <br>
		   &nbsp;&nbsp;&nbsp;<b>Current Date&nbsp;:&nbsp;</b><?=get_datetime();?>
		   <br>
		    &nbsp;&nbsp;&nbsp;<b>System Load&nbsp;:</b><br>
		   <div class="card" style="margin-left:15px;margin-right:8px;padding:11px;">
		   <?=get_system_load();?>
		   </div>
		   <br>
		   <b>&nbsp;Memory Information</b><br>
		   &nbsp;&nbsp;&nbsp;<b>Memory Total&nbsp;:&nbsp;</b><?=convert_ToMB ($meminfo['MemTotal']);?><br>
		   &nbsp;&nbsp;&nbsp;<b>Memory Free&nbsp;&nbsp;:&nbsp;</b><?=convert_ToMB ($meminfo['MemFree']);?><br>
		   &nbsp;&nbsp;&nbsp;<b>Memory Used&nbsp;:&nbsp;</b><?=convert_ToMB ($memused);?>
		   <br><br>
		   <b>&nbsp;Harddrive Information</b><br>
		   &nbsp;&nbsp;&nbsp;<b>Free Drive Space:&nbsp;</b><?=get_hdd_freespace()/1073741824;?> GB

		</div>
		   
	      </div>
            </div>
          </div>
              
		<!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Lastest fault Interfaces</h6>
                </div>
		<br>
		
                <?php
                	     echo"
                      <div class=\"table-responsive\">
                      <table class=\"\" id=\"dataTable\" width=\"100%\" cellspacing=\"1\">
                        <thead>
                          <tr>
                            <th>Time/Date</th>
                	    	    <th>Hostname</th>
                            <th>Interfaces</th>
                           </tr>
                        </thead>
                        <tbody>";

                	    require_once("koneksi/koneksi.php");
                	    $ambil_gagal="SELECT * FROM log_int WHERE intstatus='2' ORDER BY dates DESC, times DESC LIMIT 10";
                    	    $hasil_gagal=$db->query($ambil_gagal);
                            while($rows=mysqli_fetch_array($hasil_gagal,MYSQLI_ASSOC)){
                		$id_connection=$rows['id_connection'];
				
				$ambilcon="SELECT id_device FROM connection WHERE id_connection='$id_connection'";
                      		$hasilambilcon =$db->query($ambilcon);
                      		while($row11=mysqli_fetch_array($hasilambilcon,MYSQLI_ASSOC)){
					$id_dev=$row11['id_device'];
				}

					$ambildevice="SELECT * FROM devices WHERE id_device='$id_dev'";
					$hasil_dev=$db->query($ambildevice);
                         		while($rows2=mysqli_fetch_array($hasil_dev,MYSQLI_ASSOC)){
						$type_device=$rows2['type_device'];
					}
					if($type_device=='Router'){
						$link="report_fault.php";
		      			}elseif($type_device=='Switch'){
						$link="details_switch.php";
		      			}elseif($type_device=='Wireless'){
						$link="details_wireless.php";
		      			}elseif($type_device=='Storage'){
						$link="details_storage.php";
		     			}elseif($type_device=='Server'){
						$link="details_server.php";
		      			}elseif($type_device=='PC'){
						$link="details_pc.php";
		      			}elseif($type_device=='Other'){
						$link="details_other.php";
		     		 	}else{
						$link="#";
		      			}



                		$ambil_nama="SELECT * FROM resources WHERE id_connection='$id_connection' ORDER BY dates DESC, times DESC LIMIT 1";
                         	$hasil_nama=$db->query($ambil_nama);
                         	while($rows1=mysqli_fetch_array($hasil_nama,MYSQLI_ASSOC)){
                  			$hostname=$rows1['hostname'];
                		}

                		$dates=$rows['dates'];
                		$times=$rows['times'];
                		$intname=$rows['intname'];

                   		echo"
                                <tr>
                                  <td>$times,$dates</td>
                                  <td><a href=\"$link?id=$id_dev&id_connection=$id_connection\">$hostname</a></td>
                                  <td>$intname</td>
                                </tr>
                                ";

                	    }



                  	echo "
                        </tbody>
                        </table>
                      </div>"
			;
			
                ?>


		<br>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Real Time Fault Devices</h6>
                </div>
                <div class="card-body">
		  
                  <p>Monitoring terhadap device yang tidak terhubung dengan Network Management System Pusteksat LAPAN</p>
		
                 			
   		   <?php
                	      echo"
                      <div class=\"table-responsive\">
                      <table class=\"\" id=\"dataTable\" width=\"100%\" cellspacing=\"1\">
                        <thead>
                          <tr>
                             <th>Hostname</th>
                	    	     <th>IP Address</th>
                             <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>";

                		require_once("koneksi/koneksi.php");
                		$ambil_gagal="SELECT * FROM connection WHERE snmp_version!='' AND status!='Connected'";
                        	$hasil_gagal=$db->query($ambil_gagal);
                        	while($rows=mysqli_fetch_array($hasil_gagal,MYSQLI_ASSOC)){
                			$id_connection=$rows['id_connection'];
				$id_device=$rows['id_device'];

                		$ambil_nama="SELECT * FROM resources WHERE id_connection='$id_connection' ORDER BY dates DESC, times DESC LIMIT 1";
                            	$hasil_nama=$db->query($ambil_nama);
                           	while($rows1=mysqli_fetch_array($hasil_nama,MYSQLI_ASSOC)){
                  			$hostname=$rows1['hostname'];
                			}

                			$ip=$rows['ip_device'];
                			$status=$rows['status'];
                

                   		echo"
                                <tr>
                                  <td><a href=\"details_device.php?id=$id_device\">$hostname</a></td>
                                  <td>$ip</td>
                                  <td>$status</td>
                                </tr>
                                ";

               		 }



                  	echo "
                        </tbody>
                        </table>
                      </div>";
                	  ?>


		</div>

				

              </div>

             
            </div>




<!--mon tanpa snmp -->

<div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Monitoring Devices that don't have Protocol SNMP</h6>
                </div>
                <div class="card-body">
		  
		<p>Hanya dapat memantau perangkat terkoneksi/terhubung dengan NMS</p>
                 			
   		   <?php
                	      echo"
                      <div class=\"table-responsive\">
                      <table class=\"\" id=\"dataTable\" width=\"100%\" cellspacing=\"1\">
                        <thead>
                          <tr>
                             <th>Name</th>
			  <th>Type Device</th>
                	    	  <th>IP Address</th>
                             <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>";

                		require_once("koneksi/koneksi.php");
                		$ambil_gagal="SELECT * FROM connection WHERE snmp_version=''";
                        	$hasil_gagal=$db->query($ambil_gagal);
                        	while($rows=mysqli_fetch_array($hasil_gagal,MYSQLI_ASSOC)){
                			$id_device=$rows['id_device'];

                			$ambil_nama="SELECT * FROM devices WHERE id_device='$id_device'";
                            	$hasil_nama=$db->query($ambil_nama);
                           	while($rows1=mysqli_fetch_array($hasil_nama,MYSQLI_ASSOC)){
                  			$name=$rows1['name'];
					$type=$rows1['type_device'];
                			}

                			$ip=$rows['ip_device'];
                			$status=$rows['status'];
                

                   		echo"
                                <tr>
                                  <td><a href=\"details_device.php?id=$id_device\">$name</a></td>
			       <td>$type</td>
                                  <td>$ip</td>
                                  <td>$status</td>
                                </tr>
                                ";

               		 }



                  	echo "
                        </tbody>
                        </table>
                      </div>";
                	  ?>


		</div>

				

              </div>

             
            </div>

<!-- end-->


          </div>

        </div>  
	
		<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
                <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

	  
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PKL UGM 2019</span>
          <!--  <span><a href=><b>Logout</b></span> -->
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
<script>
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}

</script>

<script type="text/javascript">
	Highcharts.chart('interface', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Interface'
    },
    subtitle: {
        text: 'Resource: <?php echo"<a href=\"charts_router.php?id_connection=$id_connection\">$hostnames_hightraffic</a> , $intnames"; ?>',
    },
    xAxis: {
        categories: <?=json_encode($uptimes); ?>,
        tickmarkPlacement: 'no',
        title: {
			text:'Uptime',
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'MB'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' MB'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{

        name: 'Bytes In',
        data:<?=json_encode($bytesins); ?>
    },
    {

        name: 'Error In',
        data:<?=json_encode($error_ins); ?>
    },
    {

        name: 'Bytes Out',
        data:<?=json_encode($bytesouts); ?>
    },
    {

        name: 'Discard In',
        data:<?=json_encode($discard_ins); ?>
    }
    ]
});
</script>