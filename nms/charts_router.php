<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:/login.php');
}
else {
   $username = $_SESSION['username'];
}

    require_once("koneksi/koneksi.php");
    $id_connection=$_GET['id_connection'];
    $memory_usage=array();
    $uptime=array();
    $cpu_frequency=array();

    $ambil_connect="SELECT hostname,uptime,memory_usage,memory_total,cpu_frequency FROM resources WHERE id_connection='$id_connection' ORDER BY dates DESC,times DESC LIMIT 10";
    $hasil_connect=$db->query($ambil_connect);
    while($row=mysqli_fetch_array($hasil_connect,MYSQLI_ASSOC)){
      $hostname=$row['hostname'];
			$memory_usage[]=intval($row['memory_usage']);
			$uptime[]=strftime($row['uptime']);
			$memory_total=$row['memory_total'];
			$cpu_frequency[]=intval($row['cpu_frequency']);

	 }

   $upt=array_reverse($uptime);
   $usage=array_reverse($memory_usage);
   $cpufre=array_reverse($cpu_frequency);




?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NMS PUSTEKSAT-Router Charts</title>
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
        <!-- <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a> -->
            <a class="collapse-item" href="device_groups.php">Group</a>
            <a class="collapse-item active" href="device_routers.php">Router</a>
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
                  $username = $_SESSION['username'];
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



          <!-- Content Row -->

          <div class="row">
          </div>



            <!-- Page Heading -->
            <div id="print-area-1" class="print-area">
            <h1 class="h3 mb-2 text-gray-800">Router Charts</h1>
          <!--  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
            <!-- DataTales Example -->
                <br>
                <h4 class="h4 mb-2 text-gray-800">Hostname : <?=$hostname?></h4>
                <div style="text-align:right;"><a class="no-print d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="javascript:printDiv('print-area-1');"><i class="fas fa-download fa-sm text-white-50">Generate Report</i></a></div>
                <h4 class="h4 mb-2 text-gray-800">Resources</h4>
		<script src="javascript/highcharts.js"></script>
                <script src="javascript/exporting.js"></script>

                <div id="memory_usage" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <br>
		<script src="javascript/highcharts.js"></script>
                <script src="javascript/exporting.js"></script>

                <div id="cpu" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <br>
                <h4 class="h4 mb-2 text-gray-800">Health</h4>
	        <script src="javascript/highcharts.js"></script>
                <script src="javascript/exporting.js"></script>

                <div id="health1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <br>
		<script src="javascript/highcharts.js"></script>
                <script src="javascript/exporting.js"></script>

                <div id="health2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <br>
                <br>
                <h4 class="h4 mb-2 text-gray-800">Interfaces</h4>


                <?php
                echo"
                <form action=\"charts_router.php?id_connection=$id_connection\" method=\"POST\">

                      <select id=\"sel_id\" name=\"sel_name\" onchange=\"this.form.submit();\">
                        <option>";
                        if (isset($_POST['sel_name'])){
                          $v=$_POST['sel_name'];
                        echo"$v</option>";
                        }


                      require_once("koneksi/koneksi.php");
                      $ambil_int="SELECT * FROM interfaces WHERE id_connection='$id_connection'";
                      $intname=array();
                      $hasil_int=$db->query($ambil_int);
                      while($row=mysqli_fetch_array($hasil_int,MYSQLI_ASSOC)){
                      $intname[]=$row['intname'];

                      }
                      $blm=array_count_values($intname);
                      $hasil=count($blm);
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
                          echo "<option value=$intname>$intname<option>";
                        }
                      }

                      echo"
                      </select>
                  </form>";



                  if (isset($_POST['sel_name'])){
                    $v=$_POST['sel_name'];
                    //  echo'"'.$v.'"';


                  $intname=$v;
                  require_once("koneksi/koneksi.php");
                    $id_connection=$_GET['id_connection'];
                    $ambil_intname="SELECT * FROM interfaces WHERE id_connection='$id_connection' AND intname='$intname' ORDER BY dates DESC,times DESC LIMIT 10";
                    $hasil_intname=$db->query($ambil_intname);
                    $bytesin=array();
                    $uptime=array();
                    $bytesout=array();
                    $error_in=array();
                    $discard_in=array();

                    while($row1=mysqli_fetch_array($hasil_intname,MYSQLI_ASSOC)){
                        $uptime[]=strftime($row1['uptime']);
                        $bytesin[]=intval($row1['bytes_in']);
                        $bytesout[]=intval($row1['bytes_out']);
                        $error_in[]=intval($row['error_in']);
                        $discard_in[]=intval($row['discard_in']);
                    }
                    $uptimes=array_reverse($uptime);
                    $bytesins=array_reverse($bytesin);
                    $bytesouts=array_reverse($bytesout);
                    $error_ins=array_reverse($error_in);
                    $discard_ins=array_reverse($discard_in);
                  }



                           // print_r(json_encode($uptime));
                          //  print_r(json_encode($bytesin));
                          //  print_r(json_encode($bytesout));

                  ?>
		  <script src="javascript/highcharts.js"></script>
                  <script src="javascript/exporting.js"></script>
                  <div id="interface" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                  <?php
                    require_once("koneksi/koneksi.php");
                    $id_connection=$_GET['id_connection'];
                      $ambil_health="SELECT * FROM health WHERE id_connection='$id_connection' ORDER BY dates DESC, times DESC LIMIT 10";
                      $hasil_health=$db->query($ambil_health);
                      $uptime1=array();
                      $voltage=array();
                      $temperature=array();
                      $proccessortemperature=array();

                      while($row1=mysqli_fetch_array($hasil_health,MYSQLI_ASSOC)){
                          $uptime1[]=strftime($row1['uptime']);
                          $voltage[]=floatval($row1['voltage']);
                          $temperature[]=intval($row1['temperature']);
                          $proccessortemperature[]=intval($row1['proccessor_temperature']);

                      }
                      $uptimes_health=array_reverse($uptime1);
                      $voltages=array_reverse($voltage);
                      $temperatures=array_reverse($temperature);
                      $proccessortemperatures=array_reverse($proccessortemperature);

                   ?>

                   <textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
                   <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <br>
      <br>
      <br>
      <br>


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

<!--Js charts-->
<script src="highcharts.js"></script>
<script src="exporting.js"></script>
<!--Memory-->
<script type="text/javascript">
	Highcharts.chart('memory_usage', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Memory'
    },
    subtitle: {
        text: 'Resource: Memory Usage ,Total Memory <?=$memory_total ?>',
    },
    xAxis: {
        categories: <?=json_encode($upt); ?>,
        tickmarkPlacement: 'no',
        title: {
			text:'Uptime',
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'Usage'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' KB'
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

        name: 'Memory Usage',
        data:<?=json_encode($usage); ?>
    }]
});
</script>
<!--CPU-->
<script type="text/javascript">
	Highcharts.chart('cpu', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'CPU'
    },
    subtitle: {
        text: 'Resource: CPU Frequency',
    },
    xAxis: {
        categories: <?=json_encode($upt); ?>,
        tickmarkPlacement: 'no',
        title: {
			text:'Uptime',
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'Frequency'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' MHz'
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

        name: 'CPU Frequency',
        data:<?=json_encode($cpufre); ?>
    }]
});
</script>
<!--Health1-->
<script type="text/javascript">
	Highcharts.chart('cc', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Temperature'
    },
    subtitle: {
        text: 'Resource: Health',
    },
    xAxis: {
        categories: ,
        tickmarkPlacement: 'no',
        title: {
			text:'Uptime',
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'Temperature'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' C'
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

        name: 'Temperature',
        data:
    },
    {

        name: 'Processor Temperature',
        data:
    }
    ]
});
</script>


<script type="text/javascript">
Highcharts.chart('health1', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Temperature'
    },
    subtitle: {
        text: 'Source: Health'
    },
    xAxis: {
        categories: <?=json_encode($uptimes_health); ?>,
        title:{text:'Uptime'}
    },
    yAxis: {
        title: {
            text: 'Temperature (°C)'
        },
    },
    tooltip: {
        split: true,
        valueSuffix: ' °C'
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Temperature',
        data: <?=json_encode($temperatures); ?>
    }, {
        name: 'Processor Temperature',
        data: <?=json_encode($proccessortemperatures); ?>
    }]
});
</script>



<!--Health2-->
<script type="text/javascript">
	Highcharts.chart('health2', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'voltage'
    },
    subtitle: {
        text: 'Resource: Health',
    },
    xAxis: {
        categories:<?=json_encode($uptimes_health);?>,
        tickmarkPlacement: 'no',
        title: {
			text:'Uptime',
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'Voltage'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' V'
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

        name: 'Voltage',
        data: <?=json_encode($voltages);?>
    }]
});
</script>


<!--Interfaces-->
<script type="text/javascript">
	Highcharts.chart('interface', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Interfaces'
    },
    subtitle: {
        text: 'Resource: <?=$intname; ?>',
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
            text: 'Bytes'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' Bytes'
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
