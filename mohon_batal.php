<?php 
	error_reporting(0);
	require_once("kon.php");
	?> <script>alert('Berhasil Dihapus');</script> <?php
	if (isset($_GET['notransaksi'])) {
		mysqli_query($kon, "DELETE FROM transaksi WHERE notransaksi='$_REQUEST[notransaksi]'");
		?> <script>window.location='mohon.php';</script> <?php
	}
 ?>