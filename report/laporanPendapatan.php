<?php 
require "../kon.php"; error_reporting(0);
	$tahun = $_REQUEST['tahun'];
	if($tahun){
		$query = mysqli_query($kon, "SELECT *, YEAR(tgl) as tahun, MONTH(tgl) as bulan FROM `transaksi` WHERE YEAR(tgl) = '$tahun' GROUP BY bulan ORDER BY tgl ASC");
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
$total = 0;
while( $data = mysqli_fetch_array($query) ) :
if($data['bulan'] == 7){
  $periode = 'Juli - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 7"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 7"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 7"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 7"));
}else if($data['bulan'] == 8){
  $periode = 'Agustus - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 8"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 8"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 8"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 8"));
}else if($data['bulan'] == 9){
  $periode = 'September - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 9"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 9"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 9"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 9"));
}else if($data['bulan'] == 10){
  $periode = 'Oktober - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 10"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 10"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 10"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 10"));
}else if($data['bulan'] == 11){
  $periode = 'November - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 11"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 11"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 11"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 11"));
}else if($data['bulan'] == 12){
  $periode = 'Desember - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 12"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 12"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 12"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 12"));
}else if($data['bulan'] == 1){
  $periode = 'Januari - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 1"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 1"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 1"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 1"));
}else if($data['bulan'] == 2){
  $periode = 'Februari - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 2"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 2"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 2"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 2"));
}else if($data['bulan'] == 3){
  $periode = 'Maret - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 3"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 3"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 3"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 3"));
}else if($data['bulan'] == 4){
  $periode = 'April - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 4"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 4"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 4"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 4"));
}else if($data['bulan'] == 5){
  $periode = 'Mei - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 5"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 5"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 5"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 5"));
}else if($data['bulan'] == 6){
  $periode = 'Juni - '.$tahun;
  $laundry = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 6"));
  $pengeluaran = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM biaya WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 6"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 6"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE YEAR(tgl) = '$tahun' AND MONTH(tgl) = 6"));
}
$bersih = $laundry['total']-($pengeluaran['total']+$inventorimasuk['total']+$gaji['total']);
?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= $periode ?></td>
    <td>Rp. <?= number_format($laundry['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($pengeluaran['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($inventorimasuk['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($gaji['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($bersih,0,'.','.') ?></td>
</tr>
<?php $total+=$bersih; ?>
<?php endwhile; ?>
<tr class="text-center" style="font-weight: bold;">
    <td colspan="6">Total</td>
    <td>Rp. <?= number_format($total,0,'.','.') ?></td>
  </tr>
  </table>
</div>	
<?php require('zzz.php') ?>