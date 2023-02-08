<title>Detail Riwayat</title>
<?php

if ($_GET['id']) {
  $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Jakarta");
  $inptanggal = date('Y-m-d H:i:s');

  $arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
  $argejala = array();

  for ($i = 0; $i < count($_POST['kondisi']); $i++) {
    $arkondisi = explode("_", $_POST['kondisi'][$i]);
    if (strlen($_POST['kondisi'][$i]) > 1) {
      $argejala += array($arkondisi[0] => $arkondisi[1]);
    }
  }

  $sqlkondisi = mysqli_query($conn,"SELECT * FROM kondisi order by id+0");
  while ($rkondisi = mysqli_fetch_array($sqlkondisi)) {
    $arkondisitext[$rkondisi['id']] = $rkondisi['kondisi'];
  }

  $sqlpkt = mysqli_query($conn,"SELECT * FROM penyakit order by kode_penyakit+0");
  while ($rpkt = mysqli_fetch_array($sqlpkt)) {
    $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
    $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
    $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
    $argpkt[$rpkt['kode_penyakit']] = $rpkt['gambar'];
  }

  $sqlhasil = mysqli_query($conn,"SELECT * FROM hasil where id_hasil=" . $_GET['id']);
  while ($rhasil = mysqli_fetch_array($sqlhasil)) {
    $arpenyakit = unserialize($rhasil['penyakit']);
    $argejala = unserialize($rhasil['gejala']);
  }

  $np1 = 0;
  foreach ($arpenyakit as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
  }


// --------------------- END -------------------------

  echo "<div class='content'>
	<h2 class='text text-primary'>Hasil Diagnosis &nbsp;&nbsp;<button class='btn btn-success btn-sm' id='print' onClick='window.print();' data-toggle='tooltip' data-placement='right' title='Klik tombol ini untuk mencetak hasil diagnosa'><i class='fa fa-print'></i> Cetak</button> </h2>
		  <hr><table class='table table-bordered table-striped diagnosa'> 
          <th >No</th>
          <th >Kode</th>
          <th>Gejala yang dialami (keluhan)</th>
          <th >Pilihan</th>
          </tr>";
  $ig = 0;
  foreach ($argejala as $key => $value) {
    $kondisi = $value;
    $ig++;
    $gejala = $key;
    $sql4 = mysqli_query($conn,"SELECT * FROM gejala where kode_gejala = '$key'");
    $r4 = mysqli_fetch_array($sql4);
    echo '<tr><td>' . $ig . '</td>';
    echo '<td>G' . str_pad($r4[kode_gejala], 3, '0', STR_PAD_LEFT) . '</td>';
    echo '<td><span class="hasil text text-primary">' . $r4[nama_gejala] . "</span></td>";
    echo '<td><span class="kondisipilih" style="color:' . $arcolor[$kondisi] . '">' . $arkondisitext[$kondisi] . "</span></td></tr>";
  }
  $np = 0;
  foreach ($arpenyakit as $key => $value) {
    $np++;
    $idpkt[$np] = $key;
    $nmpkt[$np] = $arpkt[$key];
    $vlpkt[$np] = $value;
  }
  if ($argpkt[$idpkt[1]]) {
    $gambar = 'gambar/penyakit/' . $argpkt[$idpkt[1]];
  } else {
    $gambar = 'gambar/noimage.png';
  }
    echo "</table>";
  echo "<img  src='" . $gambar . "' height=200><p><p>";
  
      // --------------------- PENYAKIT  -------------------------  
  echo "<table class='table table-bordered table-striped ' id='dataTable' width='100%' cellspacing='0'><tr><th>PENYAKIT YANG DI DERITA</th></tr><tr><td>" . $nmpkt[1] . "</b> / " . round($vlpkt[1], 2) . " % ( " . $vlpkt[1] . " )</td></tr>";
// --------------------- PENYAKIT END -------------------------
  
  
     // --------------------- DETAIL -------------------------
  echo "<table class='table table-bordered table-striped ' id='dataTable' width='100%' cellspacing='0'><tr><th>DETAIL</th></tr><tr><td>" . $ardpkt[$idpkt[1]] . "</td></tr>";
 // --------------------- DETAIL END -------------------------
  
  
   // --------------------- SARAN -------------------------
  echo "<table class='table table-bordered table-striped ' id='dataTable' width='100%' cellspacing='0'><tr><th>SARAN</th></tr><tr><td>" . $arspkt[$idpkt[1]] . "</td></tr>";
 // --------------------- SARAN END -------------------------
  
  
// --------------------- KEMUNGKINAN -------------------------
  
  echo "<table class='table table-bordered table-striped ' id='dataTable' width='100%' cellspacing='0'><tr><th>KEMUNGKINAN LAIN</th></tr>"; for ($ipl = 2; $ipl < count($idpkt); $ipl++) {
      echo "<tr><td>". $nmpkt[$ipl] . "</b> / " . round($vlpkt[$ipl], 2) . " % (" . $vlpkt[$ipl] . "</td></tr>";
   }
 // --------------------- KEMUNGKINAN END -------------------------
  
  
}
?>