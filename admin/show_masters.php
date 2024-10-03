<?php require_once("header.php");  ?><section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$qry="select * from master m join arts a on(a.artsid=m.fk_art_id) ";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?>
  <a class="btn btn-primary" href="master.php">create new   </a> 
  <table class="table table-bordered" >
 <tr> 
   <th>ARTS NAME</th>  
   <th>FULL NAME</th>  
   <th>PROFILE</th>  
   <th>PHONE</th>  
   <th>GENDER</th>  
  <th>ACTIONS</th> </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
<?php 
 $pk_key=$row['master_id'];
 ?>
  <td><?php  echo $row['artsname']; ?>  </td> 
 <td><?php  echo $row['full_name']; ?>  </td> 
 <td><?php  echo $row['profile']; ?>  </td> 
 <td><?php  echo $row['phone']; ?>  </td> 
 <td><?php  echo $row['gender']; ?>  </td> 
<td> <a class="btn btn-primary btn-xs" href="edit_masters.php?pk_key=<?php  echo $pk_key; ?> " >edit</a> 
  <a class="btn btn-primary btn-xs" href="code/delete_masters.php?pk_key=<?php  echo $pk_key; ?> " >Delete</a> 
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
<?php require_once("footer.php");  ?>