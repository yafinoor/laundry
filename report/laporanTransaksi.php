<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id  WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id  WHERE YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}else{
		?> <script>alert('Data Tidak Ditemukan');window.location='../admin/transaksi.php'</script> <?php
	}
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h2 style="text-align: center;">Laporan Transaksi</h2>
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
        <th>Waktu (WITA)</th>
        <th>No.Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Total (Rp)</th>
        <th>Dicuci</th>
        <th>Antar Jemput</th>
        <th>Catatan</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
		<td><?= $i++; ?></td>
		<td><?= $data['tgl'] ?></td>
		<td><?= $data['notransaksi'] ?></td>
		<td><?= $data['nama'] ?></td>
    <td><?= $data['total'] ?></td>
    <td><?= $data['dicuci'] ?></td>
    <td><?= $data['antarjemput'] ?></td>
    <td><?= $data['catatan'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>