<?php 
	session_start();
	$idjenis = $_GET['idjenis'];
	unset($_SESSION['keranjang'][$idjenis]);
	?><script> window.location = 'mohon_input.php';</script><?php
?>