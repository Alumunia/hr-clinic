<?php 
include('koneksi.php');


session_start();
date_default_timezone_set('Asia/Jakarta');
if(empty($_SESSION['id'])){
}
else{
$id=$_SESSION['id'];
}
$home="actives";

?>



<!DOCTYPE html>
<html lang="en">
   <head>
  <?php require('layout/head.php');?>
  <style type="text/css">
/* For this page only */

.wrap { text-align:center; line-height:21px; padding:20px; }

/* For pagination function. */
ul.pagination {
    text-align:center;
    color:#829994;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
	color:#fff;
}
ul.pagination a {
    color:#0d7963;
    display:inline-block;
    
    border:1px solid #cde0dc;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#EF7D2D;
    color:#fff;
}

.nav-list{padding-right:15px;padding-left:15px;margin-bottom:0;}
.nav-list-main{padding-left:0px;padding-right:0px;margin-bottom:0;}
span.nav-toggle-icon{font-size:7px !important;top:-2px !important;color:#888 !important;}


</style>
	</head>

  <body style="font-family:Roboto;background-color: rgb(237, 237, 237);padding-top:0px">
  <div class="container" style="background-color: white;"  >
<?php include('layout/navbar.php');?>
	</div>
		
			<div class="container" style="background-color: white;padding-bottom:10px"  >
           <a href="#"><img src="assets/images/header.png"  class="img-responsive" ></a>
			</div>
			
			<div class="container" style="background-color: white;"  >
			<div class="row"> <!--THE BEGINNING ROW 3 KIRI-->
		
			<!------BEGINNING ROW 6 MIDDLE-------->
			<div class="col-xs-9" style="padding-right:0px"><!-----MENU UTAMA(GRID)-------->
			<div class="row">
			<div class="col-xs-6">
				 <div id="owl-demo" >
				 <?php $images=mysqli_query($con,"SELECT * FROM `artikel` ORDER BY `idartikel` DESC LIMIT 4");
						while($image = mysqli_fetch_array($images)){?>
                <div class="item"><img src="process/<?php echo $image['images_path'];?>" style="height:200px" alt="Owl Image">
				<div class="col-md-12" style="background-color:red;margin-top:-20px;margin-bottom:-20px;">
			
				<a href="post.php?id=<?php echo $image['idartikel']?>"><h6 class="text-center" style="color:black;color:white;padding:10px;margin-bottom:20px;"><strong><?php echo $image['judul'];?></strong></h6></a>
				</div>
				</div>
                
				<?php } ?>
                
              </div>
		
    <!-- Demo -->

    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>


    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    </script>
			</div>
			<div class="col-xs-6">
			<?php $images=mysqli_query($con,"SELECT * FROM `artikel` ORDER BY `idartikel` DESC LIMIT 4");
						while($image = mysqli_fetch_array($images)){?>
						<div class="row">
					<div class="col-xs-3"><img src="process/<?php echo $image['images_path'];?>" style="height:60px;width:100px" alt="Owl Image"></div>
					<div class="col-xs-1"></div>
					<div class="col-xs-8">
					<a href="post.php?id=<?php echo $image['idartikel']?>"><strong style="color:black"><?php echo $image['judul'] ;?></a></strong>
					</div>
					</div>
						  <br>
				
			<?php } ?>
			</div>
			</div>
			<div class="wrap">
		
		<?php
include('koneksi_post.php');

// Pagination Function
function pagination($query,$per_page=10,$page=1,$url='?'){   
    global $conDB; 
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array(mysqli_query($conDB,$query));
    $total = $row['num'];
    $adjacents = "2"; 
     
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
	$lastlabel = "Last &rsaquo;&rsaquo;";
     
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               
     
    $prev = $page - 1;                          
    $next = $page + 1;
     
    $lastpage = ceil($total/$per_page);
     
    $lpm1 = $lastpage - 1; // //last page minus 1
     
    $pagination = "";
    if($lastpage > 1){   
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
             
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
             
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
            }
         
        } elseif($lastpage > 5 + ($adjacents * 2)){
             
            if($page < 1 + ($adjacents * 2)) {
                 
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                     
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                 
            } else {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
            }
        }
         
            if ($page < $counter - 1) {
				$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
			}
         
        $pagination.= "</ul>";        
    }
     
    return $pagination;
}
		
		
		
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 4; // Set how many records do you want to display per page.

$startpoint = (($page * $per_page) - $per_page) + 4;

$statement = "`artikel` WHERE kategori='artikel' ORDER BY `idartikel` DESC" ; // Change `records` according to your table name.
 
$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

if (mysqli_num_rows($results) != 0) {
    
	// displaying records.
    while ($row = mysqli_fetch_array($results)) {?>
        <div class="col-xs-12" style="
    border-bottom: rgb(212, 208, 208);
    border-bottom-style: solid;
    border-top-width: 900px;
    padding-bottom: 30px;">
	<div class="row">

<div class="col-xs-12">

	<div class="text-center">
				<h4><a href="post.php?id=<?php echo $row['idartikel']?>"><strong style="color:black"><?php echo $row['judul'] ;?></a></strong></h4>
				<h5 class="text-left"><small> <span class="glyphicon glyphicon-pencil"></span> <?php echo $row['author'] ;?> <span class="glyphicon glyphicon-user"></span> <?php echo $row['divisi'] ;?>	<span class="glyphicon glyphicon-time"></span>  <?php echo $row['timestamp'];?></small></h5>
				
				<br>
				<div class="text-left">
				<p><?php echo substr ($row['isi'],0,100)?>...</p>
				<br>
				</div>
				<a style="color:#00AEEF" href="post.php?id=<?php echo $row['idartikel']?>"><strong>Read Post</strong></a> | <a style="color:#231F20" href="post.php?id=<?php echo $row['idartikel']?>#comments"><strong>Comment</strong></a>
					
				</div>


</div>
</div>
				</div>
    <?php }
 
} else {
     echo "No records are found.";
}

 // displaying paginaiton.
echo pagination($statement,$per_page,$page,$url='?');
?>
				</div><!-- .wrap -->
				</div>
		
			
			
			
			
			
			<!---COL MD 3 POJOK KANAN---->
		<!----SIDEBAR------>
		
		<?php
if ((($_GET["page"])%2)==0){?>
</div>
<?php
} ;
?>
		<?php include('layout/sidebar.php');?>
		<!----THE END OF SIDEBAR---->
          </div><!--/row-->
		<?php include('layout/footer.php');?>
  </body>
 
</html>

