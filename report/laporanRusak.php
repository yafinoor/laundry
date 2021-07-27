<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM inventorirusak INNER JOIN inventori ON inventorirusak.idinventori = inventori.idinventori INNER JOIN user ON inventorirusak.id = user.id WHERE MONTH(tglrusak) = '$bulan' AND YEAR(tglrusak) = '$tahun' ORDER BY tglrusak ASC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM inventorirusak INNER JOIN inventori ON inventorirusak.idinventori = inventori.idinventori INNER JOIN user ON inventorirusak.id = user.id WHERE YEAR(tglrusak) = '$tahun' ORDER BY tglrusak ASC");
	}else{
		?> <script>alert('Data Tidak Ditemukan');window.location='../admin/rusak.php'</script> <?php
	}
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h2 style="text-align: center;">Laporan Inventori Rusak</h2>
<h4 style="text-align: center;">
	<?php 
		if($bulan AND $tahun){
			echo "Bulan <b>". $namabulan."</b> pada Tahun <b>".$tahun."</b>";
		}else if($tahun AND empty($bulan)){
			echo "Tahun ". $tahun;
		}
	?>
</h4>
<h5 class="text-center">Dicetak pada tanggal : <?= date('Y-m-d') ?></h5>
<br>
<div class="container">
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Merk</th>
        <th>Pelapor</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
		<td><?= $i++; ?></td>
		<td><?= $data['tglrusak'] ?></td>
    <td><?= $data['namainven'] ?></td>
    <td><?= $data['merk'] ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['ket'] ?></td>
    <td><?= $data['jumlah'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>