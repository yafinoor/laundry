<?php 
require "../kon.php"; error_reporting(0);
	$tahun = $_REQUEST['tahun'];

	if($tahun){
		$query = mysqli_query($kon, "SELECT *, YEAR(tgl) as tahun, MONTH(tgl) as bulan FROM `transaksi` WHERE YEAR(tgl) = '$tahun' GROUP BY tahun ORDER BY tgl ASC");
		$laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun'"));
		$pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun'"));
		$inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun'"));
		$gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun'"));
	}else{
		?> <script>alert('Data Tidak Ditemukan');window.location='../admin/pendapatan.php'</script> <?php
	}
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h2 style="text-align: center;">Laporan Pendapatan</h2>
<h4 style="text-align: center;">
	<?php 
		if($tahun){
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
        <th>Periode</th>
        <th>Transaksi Laundry</th>
        <th>Biaya Pengeluaran</th>
        <th>Inventori Masuk</th>
        <th>Gaji Karyawan</th>
        <th>Laba Bersih</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($query) ) :
 ?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?php 
      if($data['bulan'] == 6){echo 'Juni'.' - '. $data['tahun']; }
      else if($data['bulan'] == 7){echo 'Juli'.' - '. $data['tahun']; }
      else if($data['bulan'] == 8){echo 'Agustus'.' - '. $data['tahun']; }
      else if($data['bulan'] == 9){echo 'September'.' - '. $data['tahun']; }
      else if($data['bulan'] == 10){echo 'Oktober'.' - '. $data['tahun']; }
      else if($data['bulan'] == 11){echo 'November'.' - '. $data['tahun']; }
      else if($data['bulan'] == 12){echo 'Desember'.' - '. $data['tahun']; }
      else if($data['bulan'] == 1){echo 'Januari'.' - '. $data['tahun']; }
      else if($data['bulan'] == 2){echo 'Februari'.' - '. $data['tahun']; }
      else if($data['bulan'] == 3){echo 'Maret'.' - '. $data['tahun']; }
      else if($data['bulan'] == 4){echo 'April'.' - '. $data['tahun']; }
      else if($data['bulan'] == 5){echo 'Mei'.' - '. $data['tahun']; }
    ?></td>
    <td>Rp. <?= number_format($laundry['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($pengeluaran['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($inventorimasuk['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($gaji['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($laundry['total']-($pengeluaran['total']+$inventorimasuk['total']+$gaji['total']),0,'.','.') ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>