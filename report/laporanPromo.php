<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis  WHERE MONTH(waktu1) = '$bulan' AND YEAR(waktu1) = '$tahun' ORDER BY waktu1 ASC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis  WHERE YEAR(waktu1) = '$tahun' ORDER BY waktu1 ASC");
	}else{
		?> <script>alert('Data Tidak Ditemukan');window.location='../admin/promo.php'</script> <?php
	}
?>
<?php require('atas.php') ?>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h2 style="text-align: center;">Laporan Promo</h2>
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
        <th>Waktu</th>
        <th>Jenis Laundry</th>
        <th>Sub Jenis</th>
        <th>Event</th>
        <th>Harga Awal</th>
        <th>Harga Promo</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
		<td><?= $i++; ?></td>
		<td><?= $data['waktu1'].' <br>'.$data['waktu2'] ?></td>
    <td><?= $data['jenis'] ?></td>
    <td><?= $data['subjenis'] ?></td>
    <td><?= $data['event'] ?></td>
    <td><?= $data['hargaawal'] ?></td>
    <td><?= $data['hargapromo'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<?php require('zzz.php') ?>