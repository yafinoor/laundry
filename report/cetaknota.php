<?php 
	require "../kon.php"; require('../tgl_indo.php'); error_reporting(0);
	$notransaksi = $_GET['notransaksi'];
	$detail = mysqli_query($kon, "SELECT * FROM detail WHERE notransaksi = '$notransaksi' ORDER BY jenisny ASC");
	$transaksi = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE notransaksi = '$notransaksi'");
	$now = mysqli_fetch_array($transaksi);
?>
<!DOCTYPE html>
<html lang="id, in">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  	<link rel="icon" type="image/png" href="../images/logo.png">
    <title>Rahima Laundry</title>
	<style>
		hr{ border: 2px; border-style: solid; width: 82%; } .wew{ margin-right: 15%; } .wow{ margin-left: 9%; float: left } #kiri{width: 50%; height: 100px; float:left; font-weight: normal; } #kanan{width: 50%; height: 100px; float:right; font-weight: normal; } th{text-align:center;}
	</style>
</head>
<body><br>
<style type="text/css" media="print"> @page { size: landscape; } </style>
<div class="container">
<div style="width: 33%; float: left; margin-top: 35px; font-weight: normal;">
	<p style="line-height: 5px;">Nama Kostumer : <?= $now['nama'] ?></p>
	<p style="line-height: 5px;">Telp : <?= $now['telp'] ?></p>
	<p style="line-height: 5px;">Alamat : <?= $now['alamat'] ?></p>
	<p style="line-height: 5px;">Layanan : <?= $now['layanan'] ?></p>
</div>
<div style="width: 33%; float: left; font-weight: normal;">
	<h3>Cetak Nota <?= $notransaksi ?></h3>
	<p>Waktu Transaksi : <?= date('d/m/Y,H:i',strtotime($now['tgl'])) ?> WITA</p>
</div>
<div style="width: 33%; float: left; font-weight: normal; margin-top: 15px;">
	<img src="../images/logo.png" style="width: 100px; margin-top: -20px; float: left; ">
	<p>Jl. Budi Waluyo, Komet, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalsel</p>
</div>
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Sub Jenis</th>
            <th>Jumlah</th>
            <th>Harga (Rp)</th>
            <th>Sub Harga (Rp)</th>
        </tr>
    </thead>
<?php 
$i = 1;
$total = 0;
while( $data = mysqli_fetch_array($detail) ) :
 ?> 
<tr class="text-center">
		<td><?= $i++; ?></td>
		<td><?= $data['jenisny'] ?></td>
    <td><?= $data['subjenisny'] ?></td>
    <td><?= $data['jumlah'] ?></td>
    <td><?= number_format($data['hargany'],0,'.','.')  ?></td>
    <td><?= number_format($data['subharga'],0,'.','.')  ?></td>
</tr>
<?php $total+=$data['subharga']; ?>
<?php endwhile; ?>
<tr>
	<td colspan="5" style="text-align: center;">Total Belanja</td>
	<td style="text-align: center;"><?= number_format($total,0,'.','.')  ?></td>
</tr>
<tr>
	<td colspan="5" style="text-align: center;">Biaya Ongkir</td>
	<td style="text-align: center;"><?= number_format($now['ongkir'],0,'.','.')  ?></td>
</tr>
<tr>
	<td colspan="5" style="font-weight:bold; text-align: center;">Total Pembayaran</td>
	<td style="font-weight: bold;text-align: center;"><?= number_format($total+$now['ongkir'],0,'.','.')  ?></td>
</tr>
  </table>
  Petunjuk atau Catatan :
  <ol>
  	<li style="font-weight: normal;">Sampaikan kepada karyawan yang bertugas di Toko jika ada Pakaian yang luntur untuk dipisahkan.</li>
  	<li style="font-weight: normal;">Pengembalian Laundry harus disertai dengan Nota.</li>
  	<li style="font-weight: normal;">Pengaduan maksimal 1x24 jam setelah laundry diterima, disertai Nota.</li>
  	<li style="font-weight: normal;">Laundry yang tidak diambil lebih dari 14 hari setelah ada pemberitahuan selesai, bukan menjadi tanggung jawab kami.</li>
  </ol>
</div>	
<?php require('zzz.php') ?> 
