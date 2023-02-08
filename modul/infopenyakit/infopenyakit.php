<title>Info Penyakit</title>

  <script type="text/javascript">
    function Blank_TextField_Validator()
    {
      if (text_form.nama_penyakit.value == "")
      {
        alert("Nama Penyakit tidak boleh kosong !");
        text_form.nama_penyakit.focus();
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
    -- >
  </script>
  <?php

  include "config/fungsi_alert.php";
  switch ($_GET[act]) {
    // Tampil penyakit
    default:
      $offset = $_GET['offset'];
      //jumlah data yang ditampilkan perpage
      $limit = 15;
      if (empty($offset)) {
        $offset = 0;
      }
      $tampil = mysqli_query($conn,"SELECT * FROM penyakit ORDER BY kode_penyakit");
      echo "<h6 class='m-0 font-weight-bold text-primary fas fa-bug fa-2x text-black-50-300'> Info Penyakit </h6>
                 <form class='d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search' method=POST action='?module=infopenyakit' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
                        <div class='input-group'>
                            <input type=text name='keyword' class='form-control bg-light border-1 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2' value='$_POST[keyword]'>
                            <div class='input-group-append'>
                                <button class='btn bg-olive border-1 margin btn-Primary ' type=submit value='   Cari   ' name=Go>
                                    <i class='fas fa-search fa-sm'></i>
                                </button>
                             </div>
                           
                        </div>
                    </form>     

            <form method=POST action='?module=admin' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'></form>";
      $baris = mysqli_num_rows($tampil);
      if ($_POST[Go]) {
        $numrows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM penyakit where nama_penyakit like '%$_POST[keyword]%'"));
        if ($numrows > 0) {
          echo "<div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i> Data yang sesuai!</h4>
             
              </div>";
          $i = 1;
          echo" <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th>No</th>
                            <th>Gambar</th>
                             <th>Nama Penyakit</th>
			  <th>Detail Penyakit</th>
			  <th>Saran Pengobatan</th>
           
            </tr>
          </thead>
		  <tbody>";
          $hasil = mysqli_query($conn,"SELECT * FROM penyakit where nama_penyakit like '%$_POST[keyword]%'");
          $no = 1;
          $counter = 1;
          while ($r = mysqli_fetch_array($hasil)) {
            if ($counter % 2 == 0)
              $warna = "dark";
            else
              $warna = "light";
            echo "<tr class='" . $warna . "'>
			 <td align=center>$no</td>
                         <td><img src='./gambar/penyakit/$r[gambar]' height='100px' width='200px;'></td>
			 <td>$r[nama_penyakit]</td>
			 <td>$r[det_penyakit]</td>
			 <td>$r[srn_penyakit]</td>
			 </tr>";
            $no++;
            $counter++;
          }
          echo "</tbody></table>";
        }
        else {
          echo "<div class='alert alert-danger alert-dismissible'>
                <h4><i class='icon fa fa-ban'></i> Gagal!</h4>
                Maaf, Penyakit yang anda cari tidak ditemukan , silahkan inputkan dengan benar dan cari kembali.
              </div>";
        }
      } else {

        if ($baris > 0) {
          echo" <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Penyakit</th>
			  <th>Detail Penyakit</th>
			  <th>Saran Pengobatan</th>
                             
            </tr>
          </thead>
		  <tbody>
		  ";
          $hasil = mysqli_query($conn,"SELECT * FROM penyakit ORDER BY kode_penyakit limit $offset,$limit");
          $no = 1;
          $no = 1 + $offset;
          $counter = 1;
          while ($r = mysqli_fetch_array($hasil)) {
            if ($counter % 2 == 0)
              $warna = "dark";
            else
              $warna = "light";
            echo "<tr class='" . $warna . "'>
			 <td align=center>$no</td>
                         <td><img src='./gambar/penyakit/$r[gambar]' height='100px' width='200px;'></td>
			 <td>$r[nama_penyakit]</td>
			 <td>$r[det_penyakit]</td>
			 <td>$r[srn_penyakit]</td>
			 </tr>";
            $no++;
            $counter++;
          }
          echo "</tbody></table>";
          echo "<div class=pagination>";

          if ($offset != 0) {
            $prevoffset = $offset - 10;
            echo "<li class='page-item '><span class=page-link> <a href=index.php?module=penyakit&offset=$prevoffset>Back</a></span></li>";
          } else {
            echo "<li class='page-item disabled'><span class=page-link>Back</span></li>"; //cetak halaman tanpa link
          }
          //hitung jumlah halaman
          $halaman = intval($baris / $limit); //Pembulatan

          if ($baris % $limit) {
            $halaman++;
          }
          for ($i = 1; $i <= $halaman; $i++) {
            $newoffset = $limit * ($i - 1);
            if ($offset != $newoffset) {
              echo "<li class='page-item '><span class=page-link><a href=index.php?module=penyakit&offset=$newoffset>$i</a></li>";
              //cetak halaman
            } else {
              echo "<li class='page-item disabled'><span class=page-link>" . $i . "</span></li>"; //cetak halaman tanpa link
            }
          }

          //cek halaman akhir
          if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {

            //jika bukan halaman terakhir maka berikan next
            $newoffset = $offset + $limit;
            echo "<li class='page-item'><span class=page-link><a href=index.php?module=penyakit&offset=$newoffset>Next</a></li>";
          } else {
       echo "<li class='page-item disabled'><span class=page-link>Next</span></li>"; //cetak halaman tanpa link
           }

          echo "</div>";
        } else {
          echo "<br><b>Data Kosong !</b>";
        }
      }
      break;


  }
  ?>
