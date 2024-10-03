<?php require_once("../admin/header.php");  ?><section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$qry="select * from video_tips v join arts a on a.artsid=v.fk_arts_id";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?>
  <table class="table table-bordered" >
 <tr> 
 <th>TITLE</th>   
   <th>DESCRIPTION</th>  
   <th>ARTS NAME</th>   
   <th>MASTER</th>  
   <th>VIDEO</th>
 </tr> 
 <?php
$qry = "select * from video_tips v JOIN arts a ON a.artsid = v.fk_arts_id join master m on m.fk_art_id=v.fk_arts_id";
$obj = new connectionclass();
$data = $obj->GetTable($qry);

if ($data > 0) {
    foreach ($data as $row) {
        $videotitle = $row['title'];
        $description = $row['description'];
        $videoUrl = $row['video_url'];
        $artsName = $row['artsname'];
        $mastername=$row['full_name'];

        echo '<tr>';
        echo '<td>' . $videotitle . '</td>';
        echo '<td>' . $description . '</td>';
        echo '<td>' . $artsName . '</td>';
        echo '<td>' . $mastername . '</td>';
        echo '<td>';
        echo '<iframe width="320" height="240" src="' . $videoUrl . '" frameborder="0" allowfullscreen></iframe>';
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











