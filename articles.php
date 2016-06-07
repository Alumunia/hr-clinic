<?php 
include('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
include('layout/identifier.php');

if (isset($_GET['approve'])){
$app=$_GET['approve'];
mysqli_query($con,"UPDATE komentar SET status=1 WHERE idkomentar = $app");
}
else if (isset($_GET['delete'])){
$del2=$_GET['delete'];
mysqli_query($con,"DELETE FROM `komentar` WHERE artikel_idartikel= $del2");
mysqli_query($con,"DELETE FROM `artikel` WHERE idartikel= $del2");
}
else{};


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
</style>
 </head>
 <body style="font-family:Roboto;background-color: rgb(237, 237, 237);padding-top:0px">
  <div class="container" style="background-color: white;"  >
<?php include('layout/navbar.php'); ?>
<h4 class="text-left"><strong>DAFTAR ARTIKEL</strong></h4>
<BR>
<table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Divisi</th>
            <th>Kategori</th>
            <th>Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    
		
		<?php
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 7; // Set how many records do you want to display per page.

$startpoint = ($page * $per_page) - $per_page;

$statement = "`artikel` ORDER BY `idartikel` DESC"; // Change `records` according to your table name.
 
$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

if (mysqli_num_rows($results) != 0) {
    $number=0;
	// displaying records.
    while ($row = mysqli_fetch_array($results)) {?>
		   <tr>
            <td><?php echo ++$number;?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['divisi']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
			<td><a href ="editor.php?id=<?php echo $row['idartikel'];?>" type="button" class="btn btn-info"  > <span class="glyphicon glyphicon-edit"></span></a> || <!-- Button trigger modal -->
<button class="btn btn-danger " data-toggle="modal" data-target="#myModal" data-whatever12="<?php echo $row['idartikel'] ?>" data-whatever="<?php echo $row['judul'] ?>">
  <span class="glyphicon glyphicon-trash"></span>
</button> </td>
			  </tr>
			    <?php }
 
} else {
     echo "No records are found.";
}
?>

				
        
        
        </tbody>
      </table>
	  <?php
 // displaying paginaiton.
echo pagination($statement,$per_page,$page,$url='?');
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Hapus Artikel</h4>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin untuk menghapus "<strong></strong>"?</p>
	  </div>
      <div class="modal-footer">
							<form action="articles.php" method="get">
							  <input type="text" name="delete" hidden="hidden"/>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							  <button type="submit" class="btn btn-danger">Hapus</button>
							</form>
						  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			
	</div>
<!-- Button trigger modal -->
	<script>
	$('#myModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var recipient = button.data('whatever')
	  var recipient12 = button.data('whatever12')
	  var modal = $(this)
	  modal.find('.modal-body p strong').text(recipient)
	  modal.find('.modal-footer form input').val(recipient12)
	})    
	</script>
</body>



</html>