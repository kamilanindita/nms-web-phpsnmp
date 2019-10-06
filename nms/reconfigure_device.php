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

  <title>NMS PUSTEKSAT-Reconfigure Divece</title>
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
            <a class="collapse-item" href="Configure_notifications.php">Notifications</a>
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reconfigure Divece</h1>

          </div>

          <!-- Content Row
          <div class="row">

          </div>
          -->
          <div class="row">
            <?php

            $id=$_GET['id'];

            echo"
            <form  class=\"user\" action=\"proses_reconfigure_device.php\" method=\"POST\">
            <div class=\"row\">
              <div class=\"col-lg-6\">
              ";

                require_once("koneksi/koneksi.php");
                $ambil_iddevice="SELECT * FROM devices WHERE id_device='$id'";
                $hasil_ambil=$db->query($ambil_iddevice);
                while($row=mysqli_fetch_array($hasil_ambil,MYSQLI_ASSOC)){
                $grup=$row['grup'];
                $name=$row['name'];
                $type_device=$row['type_device'];
                $description=$row['description'];
                $location=$row['location'];

                echo"
                <input type=\"text\" value=\"$id\" name=\"id\" hidden>
                <div class=\"p-5\">

                    <div class=\"form-group\">
                      <label for=\"grup\">Group</label>
                      <input type=\"text\" class=\"form-control\" value=\"$grup\" name=\"grup\" id=\"group\" required>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"name\">Name</label>
                      <input type=\"text\" class=\"form-control\" value=\"$name\" name=\"name\" id=\"name\" required>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"type_device\">Select Type Device:</label>

                      <select class=\"form-control\" name=\"type_device\" id=\"type_device\" required>
                      ";
                      //Router Selected
                        if($type_device=="Router"){
                        echo"
                        <option selected>Router</option>
                        <option>Wireless</option>
                        <option>Switch</option>
                        <option>Server<option>
                        <option>Storage</option>
                        <option>PC</option>
                        <option>Other</option>
                        ";
                        }
                        //Wireless
                        elseif($type_device=="Wireless"){
                        echo"
                        <option>Router</option>
                        <option selected>Wireless</option>
                        <option>Switch</option>
                        <option>Server<option>
                        <option>Storage</option>
                        <option>PC</option>
                        <option>Other</option>
                        ";
                        }
                        //Switch
                        elseif($type_device=="Switch"){
                        echo"
                        <option>Router</option>
                        <option>Wireless</option>
                        <option selected>Switch</option>
                        <option>Server<option>
                        <option>Storage</option>
                        <option>PC</option>
                        <option>Other</option>
                        ";
                        }
                        //Server
                        elseif($type_device=="Server"){
                        echo"
                        <option>Router</option>
                        <option>Wireless</option>
                        <option>Switch</option>
                        <option selected>Server<option>
                        <option>Storage</option>
                        <option>PC</option>
                        <option>Other</option>
                        ";
                        }
                        //Storage
                        elseif($type_device=="Storage"){
                        echo"
                        <option>Router</option>
                        <option>Wireless</option>
                        <option>Switch</option>
                        <option>Server<option>
                        <option selected>Storage</option>
                        <option>PC</option>
                        <option>Other</option>
                        ";
                        }
                        //PC
                        elseif($type_device=="PC"){
                        echo"
                        <option>Router</option>
                        <option>Wireless</option>
                        <option>Switch</option>
                        <option>Server<option>
                        <option>Storage</option>
                        <option selected>PC</option>
                        <option>Other</option>
                        ";
                        }
                        //Other
                        elseif($type_device=="Other"){
                        echo"
                        <option>Router</option>
                        <option>Wireless</option>
                        <option>Switch</option>
                        <option>Server<option>
                        <option>Storage</option>
                        <option>PC</option>
                        <option selected>Other</option>
                        ";
                        }
                        else{
                        echo"
                        <option selected>---</option>
                        <option>Router</option>
                        <option>Wireless</option>
                        <option>Switch</option>
                        <option>Server<option>
                        <option>Storage</option>
                        <option>PC</option>
                        <option>Other</option>
                          ";
                        }





                      echo"
                      </select>

                    </div>
                    <div class=\"form-group\">
                      <label for=\"description\">Description</label>
                      <textarea class =\"form-control\" rows=\"3\" name=\"description\"  id=\"description\">$description</textarea>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"location\">Location</label>
                      <textarea class =\"form-control\" rows=\"3\" name=\"location\"  id=\"location\">$location</textarea>
                    </div>

                </div>
              </div>
              ";
              }


              echo "
              <div class=\"col-lg-6\">
              ";

                require_once("koneksi/koneksi.php");
                $ambil_connect="SELECT * FROM connection WHERE id_device='$id'";
                $hasil_connect=$db->query($ambil_connect);
                while($row=mysqli_fetch_array($hasil_connect,MYSQLI_ASSOC)){
                $ip_device=$row['ip_device'];
                $user_community=$row['user_community'];
                $snmp_version=$row['snmp_version'];
                $mechanism=$row['mechanism'];
                $auth_protocol=$row['auth_protocol'];
                $auth_password=$row['auth_password'];
                $encrypt_protocol=$row['encrypt_protocol'];
                $encrypt_password=$row['encrypt_password'];

                echo"
                <div class=\"p-5\">

                    <div class=\"form-group\">
                      <label for=\"ipaddress\">Ip Address</label>
                      <input type=\"text\" class=\"form-control\" value=\"$ip_device\" name=\"ip_device\" id=\"ipaddress\" required>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"snmpversion\">SNMP Version</label>
                      <select class=\"form-control\" name=\"snmp_version\" id=\"snmpversion\" required>
                      ";
                        //version1
                        if($snmp_version=="1"){
                        echo"
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        ";
                        }
                        //version2
                        elseif($snmp_version=="2"){
                        echo"
                        <option>1</option>
                        <option selected>2</option>
                        <option>3</option>
                        ";
                        }
                        //version3
                        elseif($snmp_version=="3"){
                        echo"
                        <option>1</option>
                        <option>2</option>
                        <option selected>3</option>
                        ";
                        }
                        else{
                        echo"
                        <option selected>---</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        ";
                        }

                      echo"
                      </select>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"usercommunity\">User Comunity</label>
                      <input type=\"text\" class=\" form-control\" value=\"$user_community\" name=\"user_community\" id=\"usercommunity\" required>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"mechanism\">Mechanism</label>
                      <select class=\"form-control\" name=\"mechanism\" id=\"mechanism\">
                      ";
                        //mechanism noAuthNoPriv
                        if($mechanism=="noAuthNoPriv"){
                        echo"
                        <option selected>noAuthNoPriv</option>
                        <option>authNoPriv</option>
                        <option>authPriv</option>
                        ";
                        }
                        //mechanism authNoPriv
                        elseif($mechanism=="authNoPriv"){
                        echo"
                        <option>noAuthNoPriv</option>
                        <option selected>authNoPriv</option>
                        <option>authPriv</option>
                        ";
                        }
                        //mechanism uthPriv
                        elseif($mechanism=="authPriv"){
                        echo"
                        <option>noAuthNoPriv</option>
                        <option>authNoPriv</option>
                        <option selected>authPriv</option>
                        ";
                        }
                        else{
                        echo"
                        <option selected>---</option>
                        <option>noAuthNoPriv</option>
                        <option>authNoPriv</option>
                        <option>authPriv</option>
                        ";
                        }
                      echo"
                      </select>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"authprotocol\">Authentication Protocol</label>
                      <select class=\"form-control\" name=\"auth_protocol\" id=\"authprotocol\">
                      ";
                        //Authentication Protocol MD5
                        if($auth_protocol=="MD5"){
                        echo"
                        <option selected>MD5</option>
                        <option>SHA1</option>
                        ";
                        }
                        //Authentication Protocol SHA1
                        elseif($auth_protocol=="SHA1"){
                        echo"
                        <option>MD5</option>
                        <option selected>SHA1</option>
                        ";
                        }
                        else{
                        echo"
                        <option selected>---<option>
                        <option>MD5</option>
                        <option>SHA1</option>
                        ";
                        }

                      echo"
                      </select>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"authpassword\">Authentication Password</label>
                      <input type=\"text\" class=\"form-control\" value=\"$auth_password\" name=\"auth_password\" id=\"authpassword\">
                    </div>
                    <div class=\"form-group\">
                      <label for=\"authprotocol\">Encryption Protocol</label>
                      <select class=\"form-control\" name=\"encrypt_protocol\" id=\"encryptprotocol\">
                      ";
                        //Encryption Protocol DES
                        if($encrypt_protocol=="DES"){
                        echo"
                        <option selected>DES</option>
                        <option>AES</option>
                        ";
                        }
                        //Encryption  Protocol AES
                        elseif($encrypt_protocol=="AES"){
                        echo"
                        <option>DES</option>
                        <option selected>AES</option>
                        ";
                        }
                        else{
                        echo"
                        <option selected>---<option>
                        <option>DES</option>
                        <option>AES</option>
                        ";
                        }

                      echo"
                      </select>
                    </div>
                    <div class=\"form-group\">
                      <label for=\"encryptpassword\">Encryption Password</label>
                      <input type=\"text\" class=\"form-control\" value=\"$encrypt_password\" name=\"encrypt_password\" id=\"encryptpassword\">
                    </div>

                </div>

              </div>
            </div>";
          }
          echo"
          </div>

          <br>
          <div class=\"text-left\">
            <button class=\"btn btn-primary btn-block col-lg-2\">
              Save
            </button>
          </div>
          </form>
          ";


          ?>
        </div>
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
