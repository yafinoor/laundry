<?php 
session_start();
require "kon.php";
error_reporting(0);

	$username 	= $_REQUEST['username'];
	$password	= $_REQUEST['password'];

	$query = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	$cek = mysqli_fetch_array($query);
	$pelangganku = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' AND telp = '$password'");
	$yasin  = mysqli_fetch_array($pelangganku);
	if(isset($_POST['masuk'])){
		if($cek['level'] == 'Admin'){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "Admin";
			?> <script>window.location='admin/index.php'</script> <?php
		}else if($cek['level'] == 'Karyawan'){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "Karyawan";
			?> <script>window.location='karyawan/index.php'</script> <?php
		}else if(mysqli_num_rows($pelangganku) > 0){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $yasin['id'];
			$_SESSION['level'] = "Pelanggan";
			?> <script>window.location='index.php'</script> <?php
		}else{
			?><script>alert('Gagal Login');window.location="masuk.php"; </script><?php
		}
	}	
?>