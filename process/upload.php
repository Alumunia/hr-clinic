<?php
include '../koneksi.php';



if(isset($_POST['btn-upload']))
{    
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
	
$judulmaj=$_POST['judulmaj'];
$file_name=$_FILES["uploadedimage"]["name"];
$temp_name=$_FILES["uploadedimage"]["tmp_name"];
$imgtype=$_FILES["uploadedimage"]["type"];
$ext= GetImageExtension($imgtype);
$imagename=date("d-m-Y")."-".time().$ext;
$target_path = "images/".$imagename;

	
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	  $acceptable = array(
        'application/pdf',
        
      
        
    );
	$folder="uploads/";

if(!in_array($file_type,$acceptable) ) {
    echo 'error';
}
else{
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	//FOR PHOTO

	
	
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if((move_uploaded_file($file_loc,$folder.$final_file)) && (move_uploaded_file($temp_name, $target_path)))
	{

		
	mysqli_query($con,"INSERT INTO tbl_uploads VALUES('','$final_file','$file_type','$new_size','$judulmaj','$target_path')");

		
		?>
		<script>
		alert('successfully uploaded');
		window.location.href='../index.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../index.php';
        </script>
		<?php
	}
}
}
?>