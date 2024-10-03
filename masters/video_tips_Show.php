<?php require_once("../admin/header.php");  ?><section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
$mname=$_SESSION['username'];
$mast="select * from master where email='$mname'";
$mdata=$obj->GetSingleRow($mast);
$mid=$mdata['master_id'];
$qry="select * from video_tips v join master m on v.fk_arts_id=m.fk_art_id where m.master_id='$mid'"; 
  
$data=$obj->GetTable($qry);
 ?>
  <a class="btn btn-primary" href="video_add.php">create new   </a> 
  
  <table class="table table-bordered" >
 <tr> 
 <th>TITLE</th>  
   <th>VIDEO DESCRIPTION</th>  
   <th> VIDEO</th>  
  <th></th> </tr> 
  <?php

if ($data > 0) {
    foreach ($data as $row) {
        $videoid = $row['tips_id'];
        $videotitle = $row['title'];
        $description = $row['description'];
        $videoUrl = $row['video_url'];
        

        echo '<tr>';
        echo '<td>' . $videotitle . '</td>';
        echo '<td>' . $description . '</td>';
        
        echo '<td>';
        echo '<iframe width="320" height="240" src="' . $videoUrl . '" frameborder="0" allowfullscreen></iframe>';
        echo '</td>';
        echo '<td>';
        echo '<a onclick="return confirm(\'Are you sure you want to delete this video?\')" class="btn btn-primary btn-xs" href="delete_video.php?video=' . $videoid . '">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No videos found in the database</td></tr>';
}
?>
 </table> 
</section>
</div>
</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>
