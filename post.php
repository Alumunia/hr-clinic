<?php 
include('koneksi.php');
session_start();
date_default_timezone_set('Asia/Jakarta');
if(empty($_SESSION['id'])){
}
else{
$id=$_SESSION['id'];
}
$id=$_GET['id'];
if (isset($_GET['message'])){
$message="YOUR COMMENT IS WAITING MODERATION";
}
ELSE{
$message="";
}
$publis_kami="actives";

?>



<!DOCTYPE html>
<html lang="en">
   <head>
  <?php require('layout/head.php');?>
	</head>

<?php require('layout/logo.php');?>
	<!--THE BEGINNING ROW 3 KIRI-->
			<!------BEGINNING ROW 6 MIDDLE-------->
			<div class="col-xs-9">
			<?php $qry = mysqli_query($con, "SELECT * FROM artikel WHERE idartikel='$id' ");
			while($rst12 = mysqli_fetch_array($qry)) {?>
				<div class="col-xs-12">
				<div class="text-center">
				<h3><strong><?php echo $rst12['judul'];?></strong></h3>
				<h5 class="text-left"><small> <span class="glyphicon glyphicon-pencil"></span> <?php echo $rst12['author'] ;?> <span class="glyphicon glyphicon-user"></span> <?php echo $rst12['divisi'] ;?>	<span class="glyphicon glyphicon-time"></span>  <?php echo $rst12['timestamp'];?></small></h5>
				</div>
				<br>
				
				<div style=" text-align: justify;text-justify: inter-word;">
				<?php echo $rst12['isi'];?>
				</div>
				<br>
					
				
				</div>
				<?php } ?>
			
				 <!-- Comments Form -->
                <div class="well" id="comments">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="process/comment_process.php?id=<?php echo $id ?>">
					<div class="form-group">
					<input type="text" class="form-control" name="name" placeholder="Name" style="width:300px" required >
					</div>
					<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="E-mail" style="width:300px" required>
					</div>
					<div class="form-group">
                    <textarea class="form-control" name="komentar" rows="3" placeholder="Comment" required></textarea>
                    </div>
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
				<?php echo $message; ?>
                <!-- Posted Comments -->
			<?php $comentar = mysqli_query($con, "SELECT * FROM komentar WHERE artikel_idartikel='$id'  AND status=1");
			while($com = mysqli_fetch_array($comentar)) {?>
                <!-- Comment -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $com['nama'] ?>
                            <small><?php echo $com['email'] ?></small>  <small class="pull-right"><?php echo $com['timestamp'] ?></small>
                        </h4>
						<?php echo $com['isikomentar'] ?>
				   </div>
                </div>
				<?php } ?>
				</div>
		<!----SIDEBAR------>
		<?php include('layout/sidebar.php');?>
		<!----THE END OF SIDEBAR---->
          </div><!--/row-->
		
     

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="assets/js/offcanvas.js"></script>
	</div>
  </body>
 
</html>