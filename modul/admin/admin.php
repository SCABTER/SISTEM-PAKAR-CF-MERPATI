<title>Admin</title>
<?php
session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header('location:index.php');
    exit();
} else {
    ?>
<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.username.value == "")
{
   alert("Username tidak boleh kosong !");
   text_form.username.focus();
   return (false);
}
if (text_form.password.value == "")
{
   alert("Password tidak boleh kosong !");
   text_form.password.focus();
   return (false);
}
return (true);
}
function Blank_TextField_Validator_Cari()
{
if (text_form.keyword.value == "")
{
   alert("Isi dulu keyword pencarian !");
   text_form.keyword.focus();
   return (false);
}
return (true);
}
-->
</script>
<?php
include "config/fungsi_alert.php";
$aksi="modul/admin/aksi_admin.php";
switch($_GET[act]){
	// Tampil admin
  default:
  $offset=$_GET['offset'];
	//jumlah data yang ditampilkan perpage
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysqli_query($conn,"SELECT * FROM admin ORDER BY username");
	echo "
<h6 class='m-0 font-weight-bold text-primary fas fa-user fa-2x text-black-50-300'> Admin </h6>
 

                 <form class='d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search' method=POST action='?module=admin' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
                        <div class='input-group'>
                            <input type=text name='keyword' class='form-control bg-light border-1 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' value='$_POST[keyword]'>
                            <div class='input-group-append'>
                                <button class='btn bg-olive border-1 margin btn-Primary ' type=submit value='   Cari   ' name=Go>
                                    <i class='fas fa-search fa-sm'></i>
                                </button>
                             </div>
                            <div class='input-group-append'> &nbsp;
                            <button class='btn bg-olive border-1 margin btn-Primary ' type=button name=tambah value='' onclick=\"window.location.href='admin/tambahadmin';\"><i class='fa fa-plus' aria-hidden='true'></i></button>
                        </div>
                        </div>
                    </form>     

            <form method=POST action='?module=admin' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'></form>";
		  	$baris=mysqli_num_rows($tampil);
	if ($_POST[Go]){
			$numrows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin where username like '%$_POST[keyword]%'"));
			if ($numrows > 0){
				echo "<div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i> Sukses!</h4>
                Admin yang anda cari di temukan.
              </div>";
				$i = 1;
	echo" <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th width='21%'>Aksi</th>
            </tr>
          </thead>
		  <tbody>"; 
	$hasil = mysqli_query($conn,"SELECT * FROM admin where username like '%$_POST[keyword]%'");
	$no = 1;
	$counter = 1;
    while ($r=mysqli_fetch_array($hasil)){
	if ($counter % 2 == 0) $warna = "light";
	else $warna = "dark";
       echo "<tr class='".$warna."'>
			 <td align=center>$no</td>
	         <td>$r[username]</td>
	         <td>$r[nama_lengkap]</td>
			 <td align=center><a type='button' class='btn btn-success margin' href=admin/editadmin/$r[username]><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Ubah </a> &nbsp;
	          <a type='button' class='btn btn-danger margin' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=admin&act=hapus&id=$r[username]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</a>
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</tbody></table>";
			}
			else{
				echo "<div class='alert alert-danger alert-dismissible'>
                <h4><i class='icon fa fa-ban'></i> Gagal!</h4>
                Maaf, Admin yang anda cari tidak ditemukan , silahkan inputkan dengan benar dan cari kembali.
              </div>";
			}
		}else{
	
	if($baris>0){
	echo" <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th width='21%'>Aksi</th>
            </tr>
          </thead>
		  <tbody>
		  "; 
	$hasil = mysqli_query($conn,"SELECT * FROM admin ORDER BY username limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
	$counter = 1;
    while ($r=mysqli_fetch_array($hasil)){
	if ($counter % 2 == 0) $warna = "dark";
	else $warna = "light";
       echo "<tr class='".$warna."'>
			 <td align=center>$no</td>
	         <td>$r[username]</td>
	         <td>$r[nama_lengkap]</td>
			 <td align=center>
			 <a type='button' class='btn btn-success margin' href=admin/editadmin/$r[username]> Ubah </a> &nbsp;
	          <a type='button' class='btn btn-danger margin' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=admin&act=hapus&id=$r[username]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"> Hapus</a>
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</tbody></table>";
	echo "<div class=pagination>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<li class='page-item '><span class=page-link> <a href=index.php?module=admin&offset=$prevoffset>Back</a></span></li>";
	}
	else {
		echo "<li class='page-item disabled'><span class=page-link disable >Back</span></li>";//cetak halaman tanpa link
	}
	//hitung jumlah halaman
	$halaman = intval($baris/$limit);//Pembulatan

	if ($baris%$limit){
		$halaman++;
	}
	for($i=1;$i<=$halaman;$i++){
		$newoffset = $limit * ($i-1);
		if($offset!=$newoffset){
			echo "<li class='page-item '><span class=page-link><a href=index.php?module=admin&offset=$newoffset>$i</a></li>";
			//cetak halaman
		}
		else {
			echo "<li class='page-item disabled'><span class=page-link>".$i."</span></li>";//cetak halaman tanpa link
		}
	}

	//cek halaman akhir
	if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

		//jika bukan halaman terakhir maka berikan next
		$newoffset = $offset + $limit;
		echo "<li class='page-item'><span class=page-link><a href=index.php?module=admin&offset=$newoffset>Next</a></li>";
	}
	else {
		echo "<li class='page-item disabled'><span class=page-link>Next</span></li>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
	}
    break;
  
  case "tambahadmin":
	echo "<form name=text_form method=POST action='$aksi?module=admin&act=input' onsubmit='return Blank_TextField_Validator()'>
          <br><br><table class='table table-bordered'>
		  <tr><td>Nama Lengkap</td>   <td>  <input autocomplete='off' placeholder='Masukkan nama lengkap...' type=text class='form-control' name='nama_lengkap' size=30></td></tr>
          <tr><td>Username</td>   <td>  <input autocomplete='off' placeholder='Masukkan username...' type=text class='form-control' name='username' size=30></td></tr>
		  <tr><td>Password</td>   <td> <input autocomplete='off' placeholder='Masukkan password admin...' type=password class='form-control' name='password' size=30></td></tr>
		  <tr><td></td><td>
		  <input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='?module=admin';\">
		  </td></tr>
          </table></form>";
     break;
    
  case "editadmin":
    $edit=mysqli_query($conn,"SELECT * FROM admin WHERE username='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
	
    echo "<form name=text_form method=POST action='$aksi?module=admin&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[username]'>
          <br><br><table class='table table-bordered'>
	      <tr><td>Username</td> <td>  <input autocomplete='off' type=text class='form-control' name='username' value=\"$r[username]\" size=30></td></tr>
	      <tr><td>Nama Lengkap</td> <td>  <input autocomplete='off' type=text class='form-control' name='nama_lengkap' value=\"$r[nama_lengkap]\" size=30></td></tr>
          <tr><td></td><td>
		  <input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='?module=admin';\"></td></tr>
          </table></form>";
    break;  
}
?>
<?php 
} ?>
