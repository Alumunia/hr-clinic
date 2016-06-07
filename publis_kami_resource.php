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
			
			
            <img src="assets/images/hr.png"  class="img-responsive" style="width:400px">
		
			<br>
			
		    <div class="row">
			<!---IMAGE FIELD------>
			<div class="col-xs-4" style="background-color: white;border: 0px;">
			
			
			</div>
			<!----TEXT FIELD------>
			<div class="col-xs-5">
		    	<p style="font-size:20px"><strong align="justify">Divisi Human Resource (HR) merupakan divisi yang bertanggung jawab atas proses seleksi,rekruitmen,
			penempatan dan orientasi,pelatihan,karier,serta engageement</strong></p>
			</div>
			</div>
			<br>
			<div class="col-xs-9">
			
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

$startpoint = ($page * $per_page) - $per_page;

$statement = "`artikel` WHERE divisi='Human Resources' ORDER BY `idartikel` DESC"; // Change `records` according to your table name.


 
$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

if (mysqli_num_rows($results) != 0) {
    
	// displaying records.
    while ($row = mysqli_fetch_array($results)) {?>
        <div class="col-xs-12" style="
    border-bottom: rgb(212, 208, 208);
    border-bottom-style: solid;
    border-top-width: 900px;
    padding-bottom: 30px;">
				<div class="text-center">
				<h4><a href="post.php?id=<?php echo $row['idartikel']?>"><strong style="color:black"><?php echo $row['judul'];?></a></strong></h4>
				<h5 class="text-left"><small> <span class="glyphicon glyphicon-pencil"></span> <?php echo $row['author'] ;?> <span class="glyphicon glyphicon-user"></span> <?php echo $row['divisi'] ;?>	<span class="glyphicon glyphicon-time"></span>  <?php echo $row['timestamp'];?></small></h5>
				
				<br>
				<div class="text-left">
				<p><?php echo substr ($row['isi'],0,280)?>...</p>
				<br>
				</div>
				<a style="color:#00AEEF" href="post.php?id=<?php echo $row['idartikel']?>"><strong>Read Post</strong></a> | <a style="color:#231F20" href="post.php?id=<?php echo $row['idartikel']?>#comments"><strong>Comment</strong></a>
					
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
		
			</div>
				</div>
		<!----SIDEBAR------>
		<?php include('layout/sidebar.php');?>
		<!----THE END OF SIDEBAR---->
          </div><!--/row-->
<?php include('layout/footer.php');?>
  </body>
 
</html>