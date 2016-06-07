<?php
	include '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');

	
	$time= date('d-M-Y H:i');
	$bulan= date('M');
	$tahun=date ('Y');
	

	$id=$_GET['id'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi_artikel'];
	$divisi = $_POST['divisi'];
	$kategori = $_POST['kategori'];
	$author = $_POST ['author'];
	
	
	
	mysqli_query($con,"UPDATE artikel SET judul='$judul',isi='$isi',divisi='$divisi',kategori='$kategori',bulan='$bulan',tahun='$tahun',timestamp='$time',author='$author' WHERE idartikel=$id");
	header("location:../index.php");



	
?>