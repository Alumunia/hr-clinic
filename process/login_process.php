<?php
	include '../koneksi.php';
	
	$user = mysqli_real_escape_string($con, $_POST['username']);
	$pass = mysqli_real_escape_string($con, $_POST['password']);
	
	
		if (isset($_POST['name']) || !isset($_POST['pass'])){
	$query = mysqli_query($con, "SELECT * FROM member WHERE username = '$user' AND password = '$pass'");
	$result = mysqli_fetch_array($query);
	
	
		if($result) {
		session_start();
		$_SESSION['id'] = $result['username'];
		
		header("location:../index.php");}
	else{
	?>
	<script languange="javascript">alert("Harap isi password dan username dengn benar");</script>
	<script> document.location.href='../index.php';</script>
	<?php }
	}
		else{
	?>
	<script languange="javascript">alert("Harap isi password dan username dengn benar");</script>
	<script> document.location.href='../index.php';</script>
	<?php }
	
	$m = strtotime("08:00");
	$masuk = date("H:i", $m);
	
	$k = strtotime("20:00");
	$keluar = date("H:i", $k);


?>