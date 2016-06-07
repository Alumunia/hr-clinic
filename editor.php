<?php 
include('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
include('layout/identifier.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
$edit= mysqli_query($con,"SELECT * FROM artikel WHERE idartikel='$id'  ");
	$edit = mysqli_fetch_array($edit);
	$judul=$edit['judul'];
	$divisi=$edit['divisi'];
	$kategori=$edit['kategori'];
	$isi=$edit['isi'];
	$author=$edit['author'];
	$path=$edit['images_path'];
}else{

}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
  <?php require('layout/head.php');?>
 </head>
  <body style="font-family:Roboto;background-color: rgb(237, 237, 237);padding-top:0px">
  <div class="container" style="background-color: white;"  >
<?php include('layout/navbar.php');?>
	</div>
	<script type="text/javascript" src="assets/dist/tinymce/js/tinymce/tinymce.min.js"></script>
	
<script type="text/javascript">

tinymce.init({
selector: "textarea",
// ===========================================
// INCLUDE THE PLUGIN
// ===========================================
plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste jbimages"
],
// ===========================================
// PUT PLUGIN'S BUTTON on the toolbar
// ===========================================
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
// ===========================================
// SET RELATIVE_URLS to FALSE (This is required for images to display properly)
// ===========================================
relative_urls: false
});

</script>
<!-- /TinyMCE -->
 <?php if(isset($_GET['id'])){?> 
 <form role="form" method="post" enctype="multipart/form-data"  action="process/artikel_update_process.php?id=<?php echo $id;?>" />
 <?php } else{?>
 <form role="form" method="post" enctype="multipart/form-data"  action="process/artikel_process.php" />
 <?php }?>
	
  <div class="container" style="background-color: white;"  >
	<div class="col-md-12">
	<div class="row">
	<div class="col-md-3">
	<label>Judul</label>	
	<input type="text" class="form-control" name="judul" id="exampleInputEmail1" <?php if(isset($_GET['id'])){?> value="<?php echo $judul;?>"<?php } else{}?> placeholder="Judul" required />
	</div>
	<div class="col-md-3">
	<label>Divisi</label>	
	<select class="form-control" name="divisi" id="exampleInputEmail1"  placeholder="Judul"/>
	<option  <?php if(isset($_GET['id'])){?> value="<?php echo $divisi;?>"<?php } else{}?> > <?php if(isset($_GET['id'])){?> <?php echo $divisi;?><?php } else{}?></option>
	<option value="Human Resources" >Human Resources</option>
	<option value="Labour">Labour</option>
	<option value="Organization Development">Organization Development</option>
	</select>
	</div>
	<div class="col-md-3">
	<label>Kategori</label>	
	<select class="form-control" name="kategori" id="exampleInputEmail1" placeholder="Kategori" required/>
	<option  <?php if(isset($_GET['id'])){?> value="<?php echo $kategori;?>"<?php } else{}?> > <?php if(isset($_GET['id'])){?> <?php echo $kategori;?><?php } else{}?></option>
	<option value="Artikel" >Artikel</option>
	<option value="Beasiswa">Beasiswa</option>
	<option value="News">News</option>
	<option value="Lomba">Lomba</option>
	</select>
	</div>
	
	<div class="col-md-3">
	<label>Cover Artikel</label>
		<?php if(isset($_GET['id'])){?><label><?php echo $path?></label><?php } else{
		?>
		<div class="form-group">                
					 <input type="file" required name="uploadedimage" >
                    </div>
		
		
		<?php } ?>
		<br>
				
					
					
				
					

	</div>
	</div>
	</div>
	<div class="col-md-12">
	<div class="row">
	<div class="col-md-5">
	<label>Penulis</label>	
	<input type="text" class="form-control" name="author" id="exampleInputEmail1" <?php if(isset($_GET['id'])){?> value="<?php echo $author;?>"<?php } else{}?>  placeholder="penulis" required />
	</div>
	</div>
	</div>
	
	
	<br>
	
	<label>Isi Artikel</label>
<textarea type="text"  rows="9" name="isi_artikel" class="form-control" placeholder="Text input"> <?php if(isset($_GET['id'])){ echo $isi;} else{}?></textarea>

<br>
<button type="submit" value="submit" class="btn btn-primary btn-lg pull-right">Submit</button>

</div>
</form>
</body>



</html>