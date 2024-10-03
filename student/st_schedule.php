<?php require_once("../admin/header.php");  ?><section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
$pk_key=$_GET['pk_key'];
require_once("../connectionclass.php");
$qry="SELECT * FROM package  INNER JOIN arts ON package.fk_arts_id=arts.artsid inner join scheduling on scheduling.fk_package_id=package.packgeid where fk_package_id='$pk_key;' "; 
$obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?>
  <table class="table table-bordered" >
 <tr> 
   <th>PACKAGE TITLE</th>  
   <th>ARTS NAME</th>  
   <th>TIME FROM</th>  
   <th>TIME TO</th>
   <th>DATE</th>   
 </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
  <td><?php  echo $row['package_title']; ?>  </td> 
 <td><?php  echo $row['artsname']; ?>  </td> 
 <td><?php  echo $row['time_from']; ?>  </td> 
 <td><?php  echo $row['time_to']; ?>  </td>
 <td><?php  $inputdate=$row['date'];$date=date("d/m/y",strtotime($inputdate)); echo $date ?>  </td>
</tr>
<?php
}
?>
 </table> 
</section>
</div>
</div>
</div>
</section>
<?php require_once("../admin/footer.php");  ?>