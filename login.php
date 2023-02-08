 <title>Login Gagal !</title>
<?php
session_start();
include "config/koneksi.php";

$user=$_POST['username'];
$pass=md5($_POST['password']);

$login=mysqli_query($conn,"select * from admin where username='$user' and password='$pass'");

$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
if ($ketemu>0) {
	$_SESSION['username'] = $r['username'];
	$_SESSION['password'] = $r['password'];
	$_SESSION['nama_lengkap'] = $r['nama_lengkap'];
	header("location: index.php");
}
else{
  echo "
          <!-- Custom styles for this template-->
    <link href='css/sb-admin-2.css' rel='stylesheet'>
    
<body class='bg-gradient-primary'>

    <div class='container'>

        <!-- Outer Row -->
        <div class='row justify-content-center'>

            <div class='col-xl-10 col-lg-12 col-md-9'>

                <div class='card o-hidden border-0 shadow-lg my-5'>
                    <div class='card-body p-0'>
                        <!-- Nested Row within Card Body -->
                        <div class='row'>
                           <center> <div class='col-lg-5 '>
                               <img height='80%' width='80%' src='logo.png' ></center>
                            </div>
                                <div class='p-5'>
                                    <div class='text-center'>
                                        <h1 class='h4  mb-2'>User nama atau Password salah</h1>
                                        <h2 class='h2  mb-5' >Hubungi Administrator Utama untuk perbaikan atau kembali login</h2>
                                    </div>
                                     <form class='user'>
                                        <a href='https://mail.google.com/mail/u/0/?fs=1&to=18500025.rhesky@sinus.ac.id&su=CF-merpati&tf=cm' class=' btn btn-primary btn-user btn-block'>
                                          Hubungi Admin
                                        </a>
                                    </form>
                                    <form class='user'>
                                        <a href='formlogin' class='btn btn-primary btn-user btn-block'>
                                           Login......!
                                        </a>
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>
" ;
}
?>