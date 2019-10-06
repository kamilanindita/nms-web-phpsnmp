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

  <title>NMS PUSTEKSAT-Details Router</title>
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
      <li class="nav-item">
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
            <h6 class="collapse-header">Configure Devices:</h6>
            <a class="collapse-item active" href="configure_existing.php">Existing</a>
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

          <!-- Page Heading -->
        <div id="print-area-1" class="print-area">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Details Router</h1>

          </div>

          <!-- Content Row -->
          <div class="row">
          </div>
        <?php
          $id=$_GET['id'];
          $id_connection=$_GET['id_connection'];
          require_once("koneksi/koneksi.php");
          $ambil_iddevice="SELECT * FROM devices WHERE id_device='$id'";
          $hasil_ambil=$db->query($ambil_iddevice);
          while($row=mysqli_fetch_array($hasil_ambil,MYSQLI_ASSOC)){
          $grup=$row['grup'];
          $name=$row['name'];
          $type_device=$row['type_device'];
          $description=$row['description'];
          $location=$row['location'];

            $ambil_host="SELECT uptime,hostname FROM resources WHERE id_connection='$id_connection' ORDER BY dates DESC,times DESC LIMIT 1";
            $hasil_host=$db->query($ambil_host);
            while($row1=mysqli_fetch_array($hasil_host,MYSQLI_ASSOC)){
              $host=$row1['hostname'];
              $uptime=$row1['uptime'];

            }
            echo "
                  <b>Details</b><br>
                  Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; $name<br>
                  Hostname&nbsp;&nbsp;&nbsp;:&nbsp; $host<br>
                  Description&nbsp;:&nbsp; $description<br>
                  Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; $location<br>
                  UpTime&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;$uptime
                  <br>
                  <div style=\"text-align:right;\"><a class=\"no-print d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm\" href=\"javascript:printDiv('print-area-1');\"><i class=\"fas fa-download fa-sm text-white-50\">Generate Report</i></a></div>

                  <b>Interfaces</b>
                  <br>
                    <div class=\"table-responsive\">
                      <table border=\"1\" class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                        <thead>
                          <tr>
                            <th class=\"text-center\">Name</th>
                            <th class=\"text-center\">Time/Date</th>
			    <th class=\"text-center\">MAC Address</th>
                            <th class=\"text-center\">Speed</th>
                            <th class=\"text-center\">Status</th>
                            <th class=\"text-center\">Availability</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th class=\"text-center\">Name</th>
                            <th class=\"text-center\">Time/Date</th>
			    <th class=\"text-center\">MAC Address</th>
                            <th class=\"text-center\">Speed</th>
                            <th class=\"text-center\">Status</th>
                            <th class=\"text-center\">Availability</th>
                          </tr>
                        </tfoot>
                        <tbody>";

                        //menghitung jml interface
                          require_once("koneksi/koneksi.php");
                          $ambil_int="SELECT * FROM interfaces WHERE id_connection='$id_connection'";
                          $intname=array();
                          $hasil_int=$db->query($ambil_int);
                          while($row=mysqli_fetch_array($hasil_int,MYSQLI_ASSOC)){
                          $intname[]=$row['intname'];
                          }

                            $blm=array_count_values($intname);
                            $hasil=count($blm);

                            //mengambil interface name
                            require_once("koneksi/koneksi.php");
                            $ambil_int="SELECT * FROM interfaces WHERE id_connection='$id_connection'";
                            $hasil_int=$db->query($ambil_int);
                            $jmlint=$hasil;
                            $a=0;
                            while($row=mysqli_fetch_array($hasil_int,MYSQLI_ASSOC)){
                            $intname=$row['intname'];
                            $a=$a+1;
                              if($a==$jmlint){
                              break;
                              }
                              else{
                                //mengambil status interface 3 terbaru dan membandingkan
                                require_once("koneksi/koneksi.php");
                                $ambil_kondisi="SELECT * FROM interfaces WHERE id_connection='$id_connection' AND intname='$intname' ORDER BY dates DESC,times DESC LIMIT 1";
                                $hasil_kondisi=$db->query($ambil_kondisi);
                                while($row=mysqli_fetch_array($hasil_kondisi,MYSQLI_ASSOC)){
                                    $times=$row['times'];
                                    $dates=$row['dates'];
                                    $intstatus=$row['intstatus'];
                                    $speed=$row['intspeed'];
				    $mac=$row['intmac'];
                                }

                                //ambil Availability selama  request polling
                                $id_connection=$_GET['id_connection'];
                                $uptime=array();
                                $time=array();
                                $intstatus=array();
                                $ambil_connect="SELECT * FROM interfaces WHERE id_connection='$id_connection' AND intname='$intname' ORDER BY dates DESC, times DESC LIMIT 60";
                                $hasil_connect=$db->query($ambil_connect);
                                while($row=mysqli_fetch_array($hasil_connect,MYSQLI_ASSOC)){
                                  $time[]=strftime($row['times']);
                                  $uptime[]=strftime($row['uptime']);
                                  $intstatus[]=strftime($row['intstatus']);

                                 }

                                $totalup=array();
                                $totoldown=array();
                                //cek udah 1 jam blm
                                require_once("koneksi/koneksi.php");
                                $ambil_connect1="SELECT * FROM interfaces WHERE id_connection='$id_connection' AND intname='$intname' ORDER BY dates DESC, times DESC LIMIT 60";
                                $j=array();
                                $hasil_connect1=$db->query($ambil_connect1);
                                while(($row11=mysqli_fetch_array($hasil_connect1,MYSQLI_ASSOC))!=NULL){
                                  $j[]=$row11;
                                }
                                $jj=count($j);
                                if($jj<60){
                                  $availability="Belum tersedia";
                                }elseif($jj>=60) {
                                    for($i=0;$i<59;$i++){
                                         if($intstatus[$i]==1){
                                             $intstatuss="UP";
                                             $totalup[]=$intstatuss;
                                         }elseif($intstatus[$i]==2) {
                                             $intstatuss="DOWN";
                                             $totoldown[]=$intstatuss;
                                         }else {
                                           break;
                                         }
                                    }

                                  $jmlhup=count($totalup);
                                  $jmlhdown=count($totoldown);

                                  $availability=$jmlhup/($jmlhup+$jmlhdown)*100;
                                }



                                //kondisi
                                if($intstatus[0]==1){
                                  $intstatuss="UP";
                                }elseif ($intstatus[0]==2){
                                  $intstatuss="DOWN";
                                }else {
                                  // code...
                                }
                                echo"
                                <tr>
                                  <td>$intname</td>
                                  <td class=\"text-center\">$times,$dates</td>
                                  <td>$mac</td>
				  <td>$speed</td>
                                  <td>$intstatuss</td>
                                  <td class=\"text-center\">$availability %</td>
                                </tr>
                                ";
                              }
                            }


                          }

                        echo "
                        </tbody>
                      </table>
                    </div>
                    <div class=\"text-left font-italic\">* Availability for the latest 1 hour </div>
                    ";
/*
            echo"<br><br>
                <b>Interface Logs</b><br>
                <div class=\"table-responsive\">
                  <table border=\"1\" class=\"table table-bordered\" id=\"dataTable3\" width=\"100%\" cellspacing=\"0\">
                    <thead>
                      <tr>
                        <th class=\"text-center\">Name</th>
                        <th class=\"text-center\">Time</th>
                        <th class=\"text-center\">Date</th>
                        <th class=\"text-center\">UpTime</th>
                        <th class=\"text-center\">Status</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class=\"text-center\">Name</th>
                        <th class=\"text-center\">Time</th>
                        <th class=\"text-center\">Date</th>
                        <th class=\"text-center\">UpTime</th>
                        <th class=\"text-center\">Status</th>
                      </tr>
                    </tfoot>
                    <tbody>";

                      require_once("koneksi/koneksi.php");
                      $ambil_log="SELECT * FROM log_int WHERE id_connection='$id_connection'";
                      $hasilog =$db->query($ambil_log);
                      while($row2=mysqli_fetch_array($hasilog,MYSQLI_ASSOC)){
                          $times=$row2['times'];
                          $dates=$row2['dates'];
                          $uptimes=$row2['uptime'];
                          $intnames=$row2['intname'];
                          $intstatus=$row2['intstatus'];

                          if($intstatus==1){
                            $intstatuss="UP";
                          }elseif ($intstatus==2){
                            $intstatuss="DOWN";
                          }else {
                            // code...
                          }
                            echo"
                            <tr>
                              <td>$intnames</td>
                              <td>$times</td>
                              <td>$dates</td>
                              <td>$uptimes</td>
                              <td>$intstatuss</td>
                            </tr>
                            ";
                      }



                    echo "
                    </tbody>
                  </table>
                </div>
              ";

*/

        ?>


      </div>

      <textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
      <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

    </div>


      <!-- End of Main Content -->
      <br>
      <br>





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

  <!-- deleteModal Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Delete" to remove device.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <?php
          $id=$_GET['id'];
          echo"
          <a class=\"btn btn-primary\" href=\"delete_device.php?id=$id\">Delete</a>
          ";
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Js highcharts -->
  <script src="javascript/highcharts.js"></script>
  <script src="javascript/exporting.js"></script>
  <script src="javascript/export-data.js"></script>


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
