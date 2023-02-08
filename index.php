<?php
error_reporting(0);
ob_start();
session_start();
include "config/koneksi.php";
include "config/fungsi_alert.php";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <base href="http://localhost/"> 
    <title>CF-Merpati</title>
   
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
 <!-- Custom fonts for this template-->
 <link rel="stylesheet" href="./aset/fontawesome-free/css/all.min.css" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.css" rel="stylesheet">
    
   
 
     <!-- jQuery 2.1.4 -->
    <script src="./aset/jQuery-2.js"></script>
   
</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
                <div class="sidebar-brand-icon rotate-n-15">
                   </div>
                <div class="sidebar-brand-text mx-3"> <img class="sidebar-card-illustration mb-2" src="./logo.png" height="30" width="30">
                CF-Merpati</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            

            
            

 <?php include "menu.php"; ?>
            
        
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

  

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="./logo.png" alt="...">
                <p class="text-center mb-2"><strong>SISTEM PAKAR</strong> Dibuat Untuk mendeteksi penyakit merpati anda secara dini.</p>
                <a class="btn btn-success btn-sm" href="https://mail.google.com/mail/u/0/?fs=1&to=18500025.rhesky@sinus.ac.id&su=CF-merpati&tf=cm">Hubungi Pembuat!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                      
                           

                     <?php
$module = $_GET['module'];
?>

    <?php
  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
      ?>
                        <div class="topbar-divider d-none d-sm-block"></div>

                   
                            <!-- Dropdown - User Information -->

<li class="nav-item ">
                            <a class="nav-link toggle" >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucfirst($_SESSION['nama_lengkap']); ?></span><br>
                                <img class="img-profile rounded"
                                    src="logo.png">
                            </a>
                        </li>   

  <?php
  }else {
      ?>
 
    <li class="nav-item"><a a class="toggle"  <?php if ($module == "formlogin") echo 'class="nav-link active"'; ?> href="formlogin"><i class="fa fa-sign-in-alt"></i> <span>Sign-In</span></a><li>
    
   
      <?php
  }
  ?>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>

                    <!-- Content Row -->
                 

                      <?php include "content.php"; ?>	
              


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
        </div>
        <!-- End of Content Wrapper -->
 
    </div>
    <!-- End of Page Wrapper -->

  
</body>



</html>