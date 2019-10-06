<?php
//  session_start();
//  if(isset($_SESSION['username'])) {
//  header('location:index.php'); }
//  require_once("koneksi.php");

	//isset($_REQUEST['error']) ? $error = $_REQUEST['error'] : $error = "";
	
	// clean up error code to avoid XSS
	//$error = strip_tags(htmlspecialchars($error));

	//include_once ("daloradius/lang/main.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGIN USER MANAGEMENT AND NMS</title>
  <link rel="icon" type="image/png" href="nms/img/iconlapan.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="nms/css/sb-admin-2.min.css" rel="stylesheet">
	
   <style type="text/css">
        img {
             width: 180px;
             height: 140px;

        }
    </style>
</head>

<body>
<!--class="bg-gradient-primary"-->
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
	<br>
	<center><img src="nms/img/LAPAN_logo.png" alt=""></center>
	<br>
	<div class="text-center">
          <h1 class="h6 text-gray-900 mb-4">SATELLITE TECHNOLOGY CENTRE</h1>
        </div>
        <div class="card o-hidden border-0 shadow-lg my-5"> 
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900 mb-4">USERS MANAGEMENT</h1>
                  </div>
                  <form  class="user" name="login" action="#" method="POST">
                    <div class="form-group">
                      <input type="username" class="form-control" id="exampleInputEmail" placeholder="Username" name="operator_user" value="" disabled>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="operator_pass" value="" disabled>
                    </div>

                    <br>
                    <button class="btn btn-primary btn-block" disabled>
								      Login
							      </button>
                  <!--
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  -->
                </form>
               </div>
	      </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900 mb-4">NETWORK MANAGEMENT SYSTEM</h1>
                  </div>
                  <form class="user" action="proseslogin.php" method="POST">
                    <div class="form-group">
                      <input type="username" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" required>
                    </div>

                    <br>
                    <button class="btn btn-primary btn-block">
			      Login
		   </button>
                  </form>
                </div>
              </div>
            </div>
         </div> 
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="nms/vendor/jquery/jquery.min.js"></script>
  <script src="nms/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="nms/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="nms/js/sb-admin-2.min.js"></script>

</body>

</html>
