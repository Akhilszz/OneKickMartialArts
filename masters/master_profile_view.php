<?php require_once("../admin/header.php");  ?>

<section >
<div class="table-agile-info">
<div class="row">
<div class="col-lg-12">
<section class="panel">
<?php 
require_once("../connectionclass.php");
$username= $_SESSION['username'];

$qry="select * from master where email='$username' ";  
  $obj=new connectionclass() ; 
$data=$obj->GetTable($qry);
 ?> 
  <table class="table table-bordered" >
 <tr> 
   <th>NAME</th>  
   <th>PROFILE</th>  
   <th>PHONENO</th>  
   <th>GENDER</th>  
  </tr> 
<?php  
 foreach($data as $row){
 ?> 
 <tr> 
<?php 
 $pk_key=$row['master_id'];
 ?>
  <td><?php  echo $row['full_name']; ?>  </td> 
 <td><?php  echo $row['profile']; ?>  </td> 
 <td><?php  echo $row['phone']; ?>  </td>   
 <td><?php  echo $row['gender']; ?>  </td>
 <td> <a class="btn btn-primary btn-xs" href="master_profile_edit.php?pk_key=<?php  echo $pk_key; ?> " >Edit Profile </a> 
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