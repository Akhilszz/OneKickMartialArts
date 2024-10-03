<?php require_once("../admin/header.php");  ?><section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$obj=new connectionclass() ; 
$sname=$_SESSION['username'];
$stud="select * from reg where emailid='$sname'";
$sdata=$obj->GetSingleRow($stud);
$sid=$sdata['reg_id'];
// $qry="select * from video_tips v join arts a on a.artsid=v.fk_arts_id";  
  
// $data=$obj->GetTable($qry);
 ?>

  <table class="table table-bordered" >
 <tr> 
 <th>TITLE</th>   
   <th>VIDEO DESCRIPTION</th>  
   <th>video</th>   
 </tr> 
 <?php 
$qry = "select * from video_tips v join package p on v.fk_arts_id=p.fk_arts_id join booking b on b.fk_package_id=p.packgeid where b.fk_reg_id='$sid'; ";
$obj = new connectionclass();
$data = $obj->GetTable($qry);

if ($data > 0) {
    foreach ($data as $row) {
        $videotitle = $row['title'];
        $description = $row['description'];
        $videoUrl = $row['video_url'];
        // $artsName = $row['artsname'];

        echo '<tr>';
        echo '<td>' . $videotitle . '</td>';
        echo '<td>' . $description . '</td>';
        // echo '<td>' . $artsName . '</td>';
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











