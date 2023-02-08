<?php
$module = $_GET['module'];
?>

   <?php
  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
      ?>
    <li class="nav-item "><a class='nav-link active' href="dboard"> <i class="fas fa-feather-alt"></i></i> Dashboard</a><li>
 
      <?php
  }else {
      ?>
     <li class="nav-item "><a class='nav-link active' href=""> <i class="fas fa-feather-alt"></i></i> Beranda</a><li>
 
      <?php
  }
  ?>
  <?php
  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
      ?>
    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "admin") echo 'class="nav-link active"'; ?> href="admin"><i class="fa fa-user"></i> <span>Admin</span></a><li>
   	
    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "penyakit") echo 'class="nav-link active"'; ?> href="penyakit"><i class="fa fa-bug"></i> <span>Penyakit</span></a><li>
  	
    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "gejala") echo 'class="nav-link active"'; ?> href="gejala"><i class="fas fa-radiation"></i> <span>Gejala</span></a><li>

    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "pengetahuan") echo 'class="nav-link active"'; ?> href="pengetahuan"><i class="fas fa-sitemap"></i> <span>Pengetahuan</span></a><li>

    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "password") echo 'class="nav-link active"'; ?> href="password"><i class="fa fa-edit"></i> <span>Ubah Password</span></a><li>

    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "logout") echo 'class="nav-link active"'; ?> href="./logout.php"><i class="fas fa-sign-out-alt"></i> <span>Sign-Out</span></a><li>

      <?php
  }else {
      ?>
    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "diagnosa") echo 'class="nav-link active"'; ?> href="diagnosa"><i class="
fas fa-search
"></i> <span>Diagnosa</span></a><li>
    <li class="nav-item"><a class="nav-link" <?php if ($module == "riwayat") echo 'class="nav-link active"'; ?> href="riwayat"><i class="far fa-eye"></i> <span>Riwayat</span></a><li>
 
    <li class="nav-item"><a a class="nav-link"  <?php if ($module == "infopenyakit") echo 'class="nav-link active"'; ?> href="infopenyakit"><i class="fa fa-book-medical"></i> <span>Info Penyakit</span></a><li>
  <li class="nav-item"><a a class="nav-link"  <?php if ($module == "petunjuk") echo 'class="nav-link active"'; ?> href="petunjuk"><i class="fa fa-book"></i><span>Cara Penggunaan</span></a><li>
  
   <li class="nav-item"><a a class="nav-link"  <?php if ($module == "tentang") echo 'class="nav-link active"'; ?> href="tentang"><i class="fa fa-info"></i> <span>Tentang</span></a><li>

      <?php
  }
  ?>
