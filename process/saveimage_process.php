 <?php
	include '../koneksi.php';
	include '../konfoto.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../index.php");
	}
	$id = $_SESSION['id'];
	$level = $_SESSION['level'];
	$username = $_SESSION['username'];
	
	
	$day = gmdate("l");
	$date = gmdate("j F Y");
	$tgl = gmdate("Y-m-d");
	$pict = rand(1, 5);
?>
 
 
<?php



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

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "images/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {

	$query_upload="INSERT into images_tbl VALUES ('','$target_path','$tgl','$username')";
	mysql_query($query_upload) or die("error in $query_upload".mysql_error());
	header('location:../pages/table_profil.php');
}else{

   exit("Error While uploading image on the server");
} 

}

?>;
