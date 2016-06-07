	<!---COL MD 3 POJOK KANAN---->
			<div class="col-xs-3" style="padding-left:0px;padding-right:0x">
			<div class="col-xs-12">
			<?php if(empty($_SESSION['id'])){?>
			<div class="panel panel-default" style="border-radius: 10px;">
			<div class="panel-body">
			<form method="post" action="process/login_process.php" />
			<div class="form-group">
			<label for="exampleInputEmail1" style="font-size:16px;"><strong>Member</strong></label>
			<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" style=" height: 37px; font-size: 12px;">
			</div>
			<div class="form-group">
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style=" height: 37px; font-size: 12px;">
			</div>
		
			</div>
			<div class="panel-footer footlogin">
			<button type="submit" value="submit" class="btn btn-info btnlog" >Log in</button>
			</div>
  
			</form>
			</div>
			<?php }
			else{?>
			
			<a href="editor.php" type="button" class="btn btn-lg btn-primary " style="width: 100%;border-radius: 0px;border-color: rgb(66, 139, 202);">Write an article</a>
			<br>
			<br>
			<!-- Button trigger modal -->
			<a  type="button" class="btn btn-lg btn-primary "  data-toggle="modal" data-target="#myModal" style="width: 100%;border-radius: 0px;border-color: rgb(66, 139, 202);">Upload Majalah</a>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">upload Magazine</h4>
      </div>
      <div class="modal-body">
       
	<form action="process/upload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label>Upload Majalah (pdf format)</label>
	<input type="file" name="file" style="width:500px" required/>
	</div>
	<div class="form-group">
	<label>Judul Majalah</label>
	<input type="text" class="form-control" placeholder="judul majalah" name="judulmaj" required data-validation-required-message="Please enter your phone number.">
	</div>
	<div class="form-group">
	<label>Cover Majalah(image format)</label>
	<input type="file" name="uploadedimage" style="width:500px" required/> </div>                                                    
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" name="btn-upload">upload</button>
   
		</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			
    <br /><br />
   
			
			<a href="articles.php" type="button" class="btn btn-lg btn-primary " style="width: 100%;border-radius: 0px;border-color: rgb(66, 139, 202);">List Article</a>
			<br>
			<br>
			<?php 
			$result= mysqli_query($con, "SELECT * FROM komentar  WHERE status = 0");
			$result=mysqli_fetch_array($result);
			if(!empty($result)){
			?>
			<a href="comment.php" type="button" class="btn btn-lg btn-primary " style="width: 100%;border-radius: 0px;border-color: rgb(66, 139, 202);">View Comments <small style="
    color: rgb(252, 195, 37)";><strong>New<strong></small></a>
				<br>
			<br>
			<?php } else {?>
			
			<a href="comment.php" type="button" class="btn btn-lg btn-primary" style="width: 100%;border-radius: 0px;border-color: rgb(66, 139, 202);">View Comments</a>
				<br>
			<br>
			
			<?php } ?>
			<a href="logout.php" type="button" class="btn btn-lg btn-primary" style="width: 100%;border-radius: 0px;border-color: rgb(66, 139, 202);">Logout</a>	
			<?php }
			?>
			</div>
			<div class="col-xs-12"><br>
			
			<h3 style="position: absolute;color:#2e3083;"><strong>&nbsp; &nbsp;Division</strong> </h3>
			<img src="assets/images/yellow-right.svg" style="z-index: -1;width:230px;margin-top:5px"/>
			
			<div class="col-xs-12 pad3" ><a href ="publis_kami_labour.php" style="font-size:14px;color:#EF7D2D;"><Strong>Labour</strong></a></div>
			<div class="col-xs-12 pad3" ><a href ="publis_kami_organization.php" style="font-size:14px;color:#EF7D2D;"> <strong>Organization Default</strong></a></div>
			<div class="col-xs-12 pad3" ><a href ="publis_kami_resource.php" style="font-size:14px;color:#EF7D2D;"><strong>Human Resources</strong></a></div>
			
			</div>
			
			<div class="col-xs-12">
			<h3 style="position: absolute;color:#2e3083;"><strong>&nbsp;Archive</strong> </h3>
			<img src="assets/images/yellow-right.svg"   style="z-index: -1;width:230px;margin-top:5px"/>
				    <!-- sidebar menu: : style can be found in sidebar.less -->
 <?php
		  
		  $comment = mysqli_query($con, "SELECT DISTINCT tahun FROM artikel ORDER BY tahun ASC");
		  
		  while ($com= mysqli_fetch_array($comment)) {
		 $tahun = $com['tahun'];
		  ?>
		
		
    <ul class="nav nav-list-main" style="width: 130%;">
     
        <li class="nav-divider"></li>
		
        <li><label class="nav-toggle nav-header"><span> <?php echo $tahun;?></span></label>
           
			 <?php
		  
		  $comment1 = mysqli_query($con, "SELECT DISTINCT bulan FROM artikel WHERE tahun = $tahun");
		  
		  while ($com1= mysqli_fetch_array($comment1)) {
		 $bulan = $com1['bulan'];
		  ?> <ul class="nav nav-list nav-left-ml">
                <li><label class="nav-toggle nav-header"><span> <?php echo $bulan ;?></span></label>
			<?php
		  
		  $comme = mysqli_query($con, "SELECT * FROM artikel WHERE bulan= '$bulan' AND kategori='artikel' ");
		  
		  while ($co= mysqli_fetch_array($comme)) {
			
		  ?> 
                    <ul class="nav nav-list nav-left-ml">
					
                     <li><strong><a href="post.php?id=<?php echo $co['idartikel']?>" style="font-size:9px"> <?php echo $co['judul'];?></a></strong></li>
                        
                    </ul>
					 <?php } ?>
                </li>
				</ul>
             <?php } ?>
            
        </li>
		
    </ul>
	<?php } ?>
 			
					
<script>
$('ul.nav-left-ml').toggle();
$('label.nav-toggle span').click(function () {
  $(this).parent().parent().children('ul.nav-left-ml').toggle(300);
  var cs = $(this).attr("class");
  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-right') {
    $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
  }
  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-down') {
    $(this).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
  }
});
</script>
			</div>
			
			
			<div class="col-xs-12"><br>
			
			<h3 style="position: absolute;color:#2e3083;"><strong>&nbsp; &nbsp;Magazine</strong> </h3>
			<img src="assets/images/yellow-right.svg"  style="z-index: -1;width:230px;margin-top:5px"/>
			<div class="col-md-12">
				<?php $robo= mysqli_query($con, "SELECT * FROM tbl_uploads ORDER BY id DESC limit 1");
		while($robos = mysqli_fetch_array($robo)) {?>
		<a href="process/uploads/<?php echo $robos['file'];?>" target="_blank" style="color: rgb(239, 125, 45);"><h4><strong><?php echo $robos['judul'];?></strong></h4></a>
		<?php } ?>
			</div>
			<div class="row">
			<div class="col-xs-5 pad3">
			<body data-spy="scroll" data-target="#navbar-example">
			<!--DAFTAR MAJALAH-->
		<?php $robo= mysqli_query($con, "SELECT * FROM tbl_uploads ORDER BY id DESC limit 1");
		while($robos = mysqli_fetch_array($robo)) {?>
		<img src="process/<?php echo $robos['cover_path'];?>"  style="width:120px;height:180px;"/>
		<?php } ?>

	
			<script>
		$('body').scrollspy({ target: '#navbar-example' })
			</script>
			</body>
			</div>
			<div class="col-xs-7 " style="padding-right:0px;padding-left:0px;">
			<body data-spy="scroll" data-target="#navbar-example">
			<!--DAFTAR MAJALAH-->
			<ul>
		<?php $robo= mysqli_query($con, "SELECT * FROM tbl_uploads ORDER BY id DESC limit 2,3");
		while($robos = mysqli_fetch_array($robo)) {?>
		<a href="process/uploads/<?php echo $robos['file'];?>" target="_blank" style="color: rgb(239, 125, 45);"><strong style="font-size:10px" ><?php echo $robos['judul'];?></strong></a><br>
		<?php } ?>
		</ul>

	
			<script>
		$('body').scrollspy({ target: '#navbar-example' })
			</script>
			</body>
			</div>
			</div>
			
			</div>
			<div class="col-xs-12">
			<h3 style="position: absolute;color:#fff;"><strong>&nbsp;&nbsp;Facebook</strong> </h3>
			<img src="assets/images/orange-right.svg" style="z-index: -1;width:230px;margin-top:5px"/>
			<!-- Facebook Badge START --><a href="https://www.facebook.com/pages/HR-Clinic-IPB/540173952804398" title="HR Clinic IPB" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_TOP">HR Clinic IPB</a><br /><a href="https://www.facebook.com/pages/HR-Clinic-IPB/540173952804398" title="HR Clinic IPB" target="_TOP"><img class="img" src="https://badge.facebook.com/badge/540173952804398.476.1019239377.png" style="border: 0px;" alt="" /></a><br /><a href="https://en-gb.facebook.com/advertising" title="Make your own badge!" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_TOP">Promote your Page too</a><!-- Facebook Badge END -->
			
			
			</div>
			<div class="col-xs-12" style="padding-right: 0px;padding-left:0px;">
			<h3 style="position: absolute;color:#2e3083;"><strong>&nbsp;Important Links</strong> </h3>
			<img src="assets/images/yellow-right.svg"  style="z-index: -1;width:230px;margin-top:5px"/>
			<div class="col-xs-12 pad3" ><a href ="http://www.ipb.ac.id" target="_blank" style="font-size:11px;color:#f58220;font-weight:bold;">Bogor Agricultural University</a></div>
			<div class="col-xs-12 pad3"><a href ="http://www.fem.ipb.ac.id"  target="_blank"  style="font-size:11px;color:#f58220;font-weight:bold;">Faculty Of Economics and Management</a></div>
			<div class="col-xs-12 pad3" ><a href ="http://www.manajemen.fem.ipb.ac.id"  target="_blank"  style="font-size:11px;color:#f58220;font-weight:bold;">Departement of Management</a></div>
			
			</div>
			<div class="col-xs-12"><br>
			
			<h3 style="position: absolute;color:#fff;"><strong>&nbsp; &nbsp;Contact Us</strong> </h3>
			<img src="assets/images/orange-right.svg"  style="z-index: -1;width:230px;margin-top:5px"/>
			
			<div class="col-xs-12 pad3" ><a  class="contact" href ="#" >Email</a></div>
			<div class="col-xs-12 pad3"><a  class="contact" href ="#" >Telp</a></div>
			
			</div>
			</div>