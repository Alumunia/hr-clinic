<?php
	include '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');

	
	$time= date('d-M-Y H:i');
	$bulan= date('M');
	$tahun=date ('Y');
	
	
	 function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$judul = $_POST ['judul'];
	$isi = mysqli_real_escape_string($con, $_POST['isi_artikel']);
	$divisi = $_POST ['divisi'];
	$author = $_POST ['author'];
	$kategori = $_POST ['kategori'];
	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "images/".$imagename;
	
	if(move_uploaded_file($temp_name, $target_path)) {
	mysqli_query($con,"INSERT INTO artikel VALUES ('', '$judul', '$isi', '$divisi','$kategori','$bulan','$tahun','$time','$target_path','1','$author')");
	header("location:../index.php");
	
	

}
else
{
echo "faasfasghafsh";
}

	}
	else
{
echo "error my firend :)";
}
	
?>