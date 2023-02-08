<title>Riwayat</title>
<hr>
<?php
include "config/fungsi_alert.php";
$aksi = "modul/riwayat/aksi_hasil.php";
switch ($_GET[act]) {
// Tampil hasil
    default:
        $offset = $_GET['offset'];
//jumlah data yang ditampilkan perpage
        $limit = 15;
        if (empty($offset)) {
            $offset = 0;
        }

        $sqlgjl = mysqli_query($conn,"SELECT * FROM gejala order by kode_gejala+0");
        while ($rgjl = mysqli_fetch_array($sqlgjl)) {
            $argjl[$rgjl['kode_gejala']] = $rgjl['nama_gejala'];
        }

        $sqlpkt = mysqli_query($conn,"SELECT * FROM penyakit order by kode_penyakit+0");
        while ($rpkt = mysqli_fetch_array($sqlpkt)) {
            $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
            $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
            $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
        }

        $tampil = mysqli_query($conn,"SELECT * FROM hasil ORDER BY id_hasil");
        $baris = mysqli_num_rows($tampil);
        if ($baris > 0) {
            echo"                    <div class='card shadow mb-4'>
                        <div class='card-header py-3'>
                            <h6 class='m-0 font-weight-bold text-primary fa fa-clock fa-2x text-black-50-300' > Riwayat pengecekan</h6>
                        </div> 
                <div class='card-body'>
                            <div class='table-responsive'>
                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Penyakit</th>
              <th nowrap>Nilai CF</th>
              <th width='21%' class='text-center'>Aksi</th>
            </tr>
          </thead>
		  <tbody>
		  ";
            $hasil = mysqli_query($conn,"SELECT * FROM hasil ORDER BY id_hasil limit $offset,$limit");
            $no = 1;
            $no = 1 + $offset;
            $counter = 1;
            while ($r = mysqli_fetch_array($hasil)) {
              if ($r[hasil_id]>0){
                if ($counter % 2 == 0)
                    $warna = "dark";
                else
                    $warna = "light";
                echo "<tr class='" . $warna . "'>
			 <td align=center>$no</td>
			 <td>$r[tanggal]</td>
			 <td>" . $arpkt[$r[hasil_id]] . "</td>
			 <td><span class='label label-default'>" . $r[hasil_nilai] . "</span></td>
			 <td align=center>
			 <a type='button' class='btn btn-success btn-sm' target='_blank' href=riwayat-detail/$r[id_hasil]>
                              <i class='fa fa-eye' aria-hidden='true'></i> Detail </a> &nbsp;
	         </td></tr>";
                $no++;
                $counter++;
            }
            }
            echo "</tbody></table></div></div>";
            ?>
   <?php
            echo "<div class=pagination>";

            if ($offset != 0) {
                $prevoffset = $offset - $limit;
                echo "<li class='page-item '><span class=page-link><a href=index.php?module=riwayat&offset=$prevoffset>Back</a></span></li>";
            } else {
                echo "<li class='page-item disabled'><span class=page-link  >Back</span></li>"; //cetak halaman tanpa link
            }
//hitung jumlah halaman
            $halaman = intval($baris / $limit); //Pembulatan

            if ($baris % $limit) {
                $halaman++;
            }
            for ($i = 1; $i <= $halaman; $i++) {
                $newoffset = $limit * ($i - 1);
                if ($offset != $newoffset) {
                    echo "<li class='page-item '><span class=page-link><a href=index.php?module=riwayat&offset=$newoffset>$i</a></li>";
//cetak halaman
                } else {
                    echo "<li class='page-item disabled'><span class=page-link>" . $i . "</span></li>"; //cetak halaman tanpa link
                }
            }

//cek halaman akhir
            if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {

//jika bukan halaman terakhir maka berikan next
                $newoffset = $offset + $limit;
                echo "<li class='page-item '><span class=page-link> <a href=index.php?module=riwayat&offset=$newoffset>Next</a></li>";
            } else {
                echo "<li class='page-item disabled'><span class=page-link>Next</span></li>"; //cetak halaman tanpa link
            }

            echo "</div></div></div></div>";
        } else {
            echo "<br><b>Data Kosong !</b>";
        }
}
?>
      
       

<script>
    $(function () {

<?php
//$arr[] = array();

$hasilg = mysqli_query($conn,"SELECT hasil_id, count(hasil_id) jlh_id FROM hasil group by hasil_id ORDER BY jlh_id desc");
while ($rg = mysqli_fetch_array($hasilg)) {
  if ($rg[hasil_id] > 0) {
    $arr[] = array('label' => '&nbsp;' . $arpkt[$rg['hasil_id']], 'data' => array(array('Penyakit ' . $rg['hasil_id'], $rg['jlh_id'])));
  }
}
?>


