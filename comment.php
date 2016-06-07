<?php 
include('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
include('layout/identifier.php');

if (isset($_GET['approve'])){
$app=$_GET['approve'];
mysqli_query($con,"UPDATE komentar SET status=1 WHERE idkomentar = $app");
}
else if (isset($_GET['delete'])){
$del=$_GET['delete'];
mysqli_query($con,"DELETE FROM komentar  WHERE idkomentar = $del");
}
else{};





?>



<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require('layout/head.php');?>
 </head>
   <body style="font-family:Roboto;background-color:white;padding-top:0px">
  <div class="container" style="background-color: white;"  >
<?php include('layout/navbar.php');?>

<h4 class="text-left"><strong>DAFTAR KOMENTAR</strong></h4>

<br>
<br>
<?php 
$result= mysqli_query($con, "SELECT * FROM komentar WHERE status = 0");
$result=mysqli_fetch_array($result);
if(!empty($result)){
?>
<table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Author</th>
            <th>Email</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Post</th>
            <th>Kategori</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         
		  <?php
		  $number = 0;
		  $comment = mysqli_query($con, "SELECT * FROM komentar WHERE status = 0");
		  
		  while ($com= mysqli_fetch_array($comment)) {
		  $idar=$com['artikel_idartikel'];
		  ?>
		   <tr>
            <td><?php echo ++$number;?></td>
            <td><?php echo $com['nama']; ?></td>
            <td><?php echo $com['email']; ?></td>
            <td><?php echo $com['timestamp']; ?></td>
            <td><?php echo $com['isikomentar'];?></td>
			<?php $artikel = mysqli_query($con, "SELECT * FROM artikel WHERE idartikel = $idar");
			while($artikel121 = mysqli_fetch_array($artikel)) {
			$judul=$artikel121['judul'];
			$kategori=$artikel121['kategori'];
			
			}?>
            <td><?php echo $judul;?></td>
            <td><?php echo $kategori;?></td>
            <td><a href ="comment.php?approve=<?php echo $com['idkomentar'];?>" type="button" class="btn btn-info" > <span class="glyphicon glyphicon-ok"></span></a> || <a href ="comment.php?delete=<?php echo $com['idkomentar'];?>" type="button" class="btn btn-danger">  <span class="glyphicon glyphicon-trash"></span></a></td>
			
			  </tr>
			<?php } ?>
        
        
        </tbody>
      </table>
	  <?php }else {?>
	  
	  <h2 class="text-center"><strong> Tidak ada komentar </strong> </h2>
	  
	 <?php } ?>
	</div>

	
</body>



</html>