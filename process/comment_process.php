<?php
	include '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');
	$nama = $_POST ['name'];
	$komentar = mysqli_real_escape_string($con, $_POST['komentar']);
	$id = $_GET['id'];
	$time= date('d-M-Y H:i');
	$email = $_POST['email'];
	 
	mysqli_query($con,"INSERT INTO komentar VALUES('','$email','$komentar','$time','$nama','0','$id')");
	header("location:../post.php?id=$id&&message=true");
	
?>