<?php require_once("../admin/header.php");  ?><section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$qry="select * from package p join arts a on a.artsid=p.fk_arts_id";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?>
  <a class="btn btn-primary" href="package.php">create new   </a> 
  <table class="table table-bordered" >
 <tr> 
 <th>PACKAGE TITLE</th>  
   <th>ARTS NAME</th>  
   <th>DURATION</th>  
   <th>COST</th>   
  <th></th> </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
<?php 
 $pk_key=$row['packgeid'];
 ?>
  <td><?php  echo $row['package_title']; ?>  </td> 
 <td><?php  echo $row['artsname']; ?>  </td> 
 <td><?php  echo $row['duration']; ?>  </td> 
 <td><?php  echo $row['cost']; ?>  </td>
 
<td>  
<a onclick='return confirm("are you sure want to delete")' class="btn btn-primary btn-xs"   href="delete_package.php?pk_key=<?php  echo $pk_key; ?> " >delete</a>
<a   class="btn btn-danger btn-xs"   href="schedule.php?packgeid=<?php  echo $pk_key; ?> " >Schedules</a>


</td>
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