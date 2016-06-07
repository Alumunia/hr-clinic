<?php 
include('koneksi.php');
session_start();
date_default_timezone_set('Asia/Jakarta');
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
			<div class="container" style="background-color: white;margin-left:-15px"  >
			
			<br>
			
		
			<div class="col-xs-9">
			<!------LABOUR DIVISION--------->
			 <img src="assets/images/labour.png"  class="img-responsive" style="width:210px">
			 <div class="row">
			<!---IMAGE FIELD------>
			<div class="col-xs-6">
			
			</div>
			<!----TEXT FIELD------>
			<div class="col-xs-6">
			<p style="font-size:20px"><strong>Divisi Labour merupakan divisi yang membawahi bidang kompensasi,
			hubungan industrial, PHK, K3, TKI/TKA, dan MSDM Internasional</strong></p>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-xs-8"><img src="assets/images/label.png"  class="img-responsive"></div>
			<div class="col-xs-4" style="background-color: white;border: 0px;padding-top:0px">
			<a href="publis_kami_labour.php" type="button" class="btn btn-primary" style="width: 100%;border-radius: 0px;border-color: rgb(0, 174, 239);margin-left:-30px"><strong>READ MORE</strong></a></div>
			</div>
			<br>
			<!------ORGANIZATION DEVELOPMENT DIVISION--------->
			 <img src="assets/images/od.png"  class="img-responsive" style="width:540px">
			 <div class="row">
			<!---IMAGE FIELD------>
			<div class="col-xs-6">
			
			</div>
			<!----TEXT FIELD------>
			<div class="col-xs-6">
			<p style="font-size:20px"><strong>Divisi Labour merupakan divisi yang membawahi bidang kompensasi,
			hubungan industrial, PHK, K3, TKI/TKA, dan MSDM Internasional</strong></p>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-xs-8"><img src="assets/images/label.png"  class="img-responsive"></div>
			<div class="col-xs-4" style="background-color: white;border: 0px;padding-top:0px">
			<a href="publis_kami_organization.php" type="button" class="btn btn-primary" style="width: 100%;border-radius: 0px;border-color: rgb(0, 174, 239);margin-left:-30px"><strong>READ MORE</strong></a></div>
			</div>
			<br>
			<!------HUMAN RESOURCE DIVISION--------->
			 <img src="assets/images/hr.png"  class="img-responsive" style="width:400px">
			<div class="row">
			<!---IMAGE FIELD------>
			<div class="col-xs-6">
			
			</div>
			<!----TEXT FIELD------>
			<div class="col-xs-6">
			<p style="font-size:20px"><strong>Divisi Labour merupakan divisi yang membawahi bidang kompensasi,
			hubungan industrial, PHK, K3, TKI/TKA, dan MSDM Internasional</strong></p>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-xs-8"><img src="assets/images/label.png"  class="img-responsive"></div>
			<div class="col-xs-4" style="background-color: white;border: 0px;padding-top:0px">
			<a href="publis_kami_resource.php"type="button" class="btn btn-primary" style="width: 100%;border-radius: 0px;border-color: rgb(0, 174, 239);margin-left:-30px"><strong>READ MORE</strong></a></div>
			</div>
			<!-------------THE END OF DIVISON DIVIDE---------------->
			</div>
		
			</div>
			</div>
		<!----SIDEBAR------>
		<?php include('layout/sidebar.php');?>
		<!----THE END OF SIDEBAR---->
          </div><!--/row-->
<?php include('layout/footer.php');?>
  </body>
 
</html>
